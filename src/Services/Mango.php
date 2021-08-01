<?php


namespace App\Services;
require_once \dirname(__DIR__) . '../../vendor/autoload.php';


use App\Entity\Client;
use MangoPay;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use MangoPay\Card;
use Doctrine\ORM\EntityManagerInterface;
use MangoPay\CardRegistration;
use MangoPay\Libraries\Exception;
use MangoPay\Money;
use MangoPay\PayIn;
use MangoPay\PayInExecutionDetailsDirect;
use MangoPay\PayInExecutionType;
use MangoPay\PayInPaymentDetailsCard;
use MangoPay\PayInPaymentType;
use MangoPay\Transfer;
use MangoPay\UserNatural;
use MangoPay\Wallet;
use Symfony\Component\Validator\Constraints\DateTime;
use MangoPay\Libraries\IStorageStrategy;
use MangoPay\MangoPayApi;
use MangoPay\Libraries;


class Mango
{
    private $mangoPayApi;
    private $params;

    /**
    * @var MangoPay\MangoPayApi
    */
    public function __construct(ParameterBagInterface $params)
    {
        $this->params=$params;
        $this->mangoPayApi = new MangoPayApi();
        $this->mangoPayApi->Config->ClientId = "3dwavetest";
        $this->mangoPayApi->Config->ClientPassword = "uVSi0nLMBZO5NOLx3D4E0OLBqndANyDkxqBSBKpwuHKD9PJPYm";
        $this->mangoPayApi->Config->TemporaryFolder = \dirname(__DIR__) . '/../var';

        $this->mangoPayApi->Config->BaseUrl = "https://api.sandbox.mangopay.com";
    }

    /**
     * Create Mangopay Userd
     * @return MangopPayUser $mangoUser
     */
    public function getMangoUser(Client $user)
    {
       // $d =new \DateTime();
        
        try
        {
            $mangoUser = new \MangoPay\UserNatural();
            $mangoUser->FirstName = $user->getNom();
            $mangoUser->LastName = $user->getPrenom();
            $mangoUser->Birthday = $user->dateNaissance->getTimestamp();
            $mangoUser->Nationality = "TN";
            $mangoUser->CountryOfResidence = "FR";
            //$mangoUser->Email = "sarra@gmail.com";
            $mangoUser->Email = $user->getUsername();
            $mangoUser->Tag="userr";
            $mangoUser->IncomeRange = 2;
            $mangoUser->Occupation='user';

            var_dump($mangoUser);
           $mangoUser = $this->mangoPayApi->Users->Create($mangoUser);

            return $mangoUser;

        }
        
        catch(\MangoPay\Libraries\ResponseException $e)
        {
            return ("ERROR Mangopay ".$e->getCode().":".$e->getMessage().$e->getErrorDetails().$e->getTraceAsString());
        }

    }
   /* public function getMangoUser()
    {

        $mangoUser = new \MangoPay\UserNatural();
        $mangoUser->PersonType = "NATURAL";
        $mangoUser->FirstName = 'John';
        $mangoUser->LastName = 'Doe';
        $mangoUser->Birthday = 1409735187;
        $mangoUser->Nationality = "FR";
        $mangoUser->CountryOfResidence = "FR";
        $mangoUser->Email = 'john.doe@mail.com';

        //Send the request
        $mangoUser = $this->mangoPayApi->Users->Create($mangoUser);

        return $mangoUser;
    }*/


    public function CreateWallet(String $currency,String $name,String $idowner)
    {
        try
        {
            // claims wallets in ADMIN USER ACCOUNT
            $Wallet = new Wallet();
            $Wallet->Owners = $idowner;
            $Wallet->Description = $name;
            $Wallet->Currency = $currency;
            $Wallet = $this->mangoPayApi->Wallets->Create($Wallet);
            //store this in your DB: $createdWallet->Id
            return $Wallet->Id;
        }
        catch(\MangoPay\Libraries\ResponseException $e)
        {
            return ("ERROR ".$e->getCode().":".$e->getMessage());

        }

    }



    public function cardRegistration(array $data, String $mangouserid)
    {
        try
        {
            $cardRegister = new CardRegistration();
            $cardRegister->UserId = $mangouserid;
            $cardRegister->Currency = "EUR";
            $cardRegister->CardRegistrationURL="";
            $cardRegister->CardType="CB_VISA_MASTERCARD";
            //$cardRegister->CardId="";
            //do registration
            $cardRegister= $this->mangoPayApi->CardRegistrations->Create($cardRegister);

            var_dump($cardRegister);
            //put card details
            $updatedCardRegister=$this->createCard($data, $cardRegister);
            // var_dump("updated");
            //var_dump($updatedCardRegister);
            //get card object
            $card = $this->mangoPayApi->Cards->Get($updatedCardRegister->CardId);

            return $card;

        }
        catch(\MangoPay\Libraries\ResponseException $e)
        {
            return ("ERROR Mangopay ".$e->getCode().":".$e->getMessage().$e->getErrorDetails().$e->getTraceAsString());

        }


    }
    public function createCard(array $data,CardRegistration $cardregistration)
    {
        try
        {
            $data='data='.$cardregistration->PreregistrationData .
                '&accessKeyRef=' . $cardregistration->AccessKey .
                '&cardNumber=' . $data['card-number'] .
                '&cardExpirationDate=' . $data['date-exp'] .
                '&cardCvx=' . $data['CVC'];
            $request = curl_init($cardregistration->CardRegistrationURL);
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            //curl_setopt($request, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($request, CURLOPT_POST, true);
            curl_setopt($request, CURLOPT_POSTFIELDS, $data);
           // curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 2);
            //curl_setopt ($request, CURLOPT_CAINFO, "C:\wamp64\bin\php\php7.2.18\\extras\ssl\cacert.pem");
          //  curl_setopt( $request, CURLOPT_SSLCERT, "C:\wamp64\bin\php\php7.2.18\\extras\ssl\cacert.pem");

            $registrationData=curl_exec($request);
            var_dump(curl_error($request));
           var_dump($registrationData);
            $cardregistration->RegistrationData= $registrationData ;
            curl_close($request);

            return $this->mangoPayApi->CardRegistrations->update($cardregistration);
        }
        catch(\MangoPay\Libraries\ResponseException $e)
        {
            return ("ERROR ".$e->getCode().":".$e->getMessage().$e->getTraceAsString());

        }


    }
    public function getUserCards(String $userId){
        try{
            $cards = $this->mangoPayApi->Users->GetCards($userId);
            return $cards;
        }
        catch(\MangoPay\Libraries\ResponseException $e)
        {
            return ("ERROR ".$e->getCode().":".$e->getMessage());

        }

    }
    public function getOneCard(String $cardId){

        try{
            $cardInfo = $this->mangoPayApi->Cards->Get($cardId);
            return $cardInfo;
        }
        catch(\MangoPay\Libraries\ResponseException $e)
        {
            return ("ERROR get CARD".$e->getCode().":".$e->getMessage());

        }
    }

    public function getPayIn(String $PayInId){

        try{
            $PayIn = $this->mangoPayApi->PayIns->Get($PayInId);
            return $PayIn;
        }
        catch(\MangoPay\Libraries\ResponseException $e)
        {
            return ("ERROR get CARD".$e->getCode().":".$e->getMessage());

        }
    }
    public function doPayIn( string $walletId , String $card,String $mangopayid,int $amount)
    {
        try
        {
            $PayIn = new PayIn();
            $PayIn->CreditedWalletId = $walletId;
            $PayIn->AuthorId = $mangopayid;
            $PayIn->PaymentType ="CARD";
            $PayIn->CardId=$card;
            $PayIn->PaymentDetails = new PayInPaymentDetailsCard();
            $PayIn->DebitedFunds = new Money();
            $PayIn->DebitedFunds->Currency = "EUR";
            $PayIn->DebitedFunds->Amount = $amount;
            $PayIn->Fees = new Money();
            $PayIn->Fees->Currency = "EUR";
            $PayIn->Fees->Amount = 0;
            $PayIn->SecureMode="DEFAULT";
            $PayIn->Billing= "";
            $PayIn->StatementDescriptor="TEST";
            $PayIn->Culture="EN";
            $PayIn->Tag="hello";
            $PayIn->SecureModeReturnURL="http://www.google.com";
            $PayIn->ExecutionType = "DIRECT";
            $PayIn->ExecutionDetails = new PayInExecutionDetailsDirect();
//            $PayIn->ExecutionDetails->ReturnURL= "http".(isset($_SERVER['HTTPS']) ? "s" : null)."://".$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"]."?stepId=".($stepId+1);
            $PayIn->ExecutionDetails->CardId = $card;

            //apply payin
            $result = $this->mangoPayApi->PayIns->Create($PayIn);
            return $result;
        }
        catch(\MangoPay\Libraries\ResponseException $e)
        {
            return ("ERROR ".$e->getCode().":".$e->getMessage().$e->getTraceAsString().$e->getErrorDetails());

        }

    }





}
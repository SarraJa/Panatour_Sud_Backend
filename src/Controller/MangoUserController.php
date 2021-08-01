<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\ServiceDesMonuments;
use App\Entity\ServiceHotelier;
use App\Entity\ServiceRestauration;
use App\Entity\ServiceTransport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\Form;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Services\Mango;

class MangoUserController extends AbstractController
{
    public $serviceHandler;
    private $security;

    public function __construct(EntityManagerInterface $em,Mango $serviceHandler,Security $security,ParameterBagInterface $params )
    {
        $serviceHandler= new Mango($params);
        $this->security = $security;
        $this->serviceHandler=$serviceHandler;
        $this->em=$em;

    }


    public function __invoke(Client $data)
    {
        dd($data);

    }
    public function postCardInfos(Request $request)
    {

        $data = json_decode(
            $request->getContent(),
            true
        );
        $routeParameters = $request->attributes->get('_route_params');

        //var_dump($data['card-number']);
        if ($request->getMethod() == 'POST') {
            $response = $this->serviceHandler->cardRegistration($data, $routeParameters['mangopayid']);
            return new JsonResponse(
                $response,
                JsonResponse::HTTP_CREATED
            );
        }
    }
    public function payment(Request $request){

        $data = json_decode(
            $request->getContent(),
            true
        );
        $routeParameters = $request->attributes->get('_route_params');
        $don=$this->getDoctrine()
            ->getRepository(Reservation::class)
            ->findOneBySomeField($routeParameters['id']);
        if ($request->getMethod() == 'POST') {
            $response=$this->serviceHandler->doPayIn($data['walletId'],$data['cardId'],$data['authorId'],$data['amount']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($don);
            $don->setTransactionId($response->Id);
            $entityManager->flush();
            //var_dump($response->Id);
            return new JsonResponse(
                $response->Status,
                JsonResponse::HTTP_OK
            );
        }

    }

    public function getCards(Request $request){
        $routeParameters = $request->attributes->get('_route_params');
        $response=$this->serviceHandler->getUserCards($routeParameters['mangopayid']);
        return new JsonResponse(
            $response,
            JsonResponse::HTTP_OK
        );
    }

    public function getCardById(Request $request){
        $data = json_decode(
            $request->getContent(),
            true
        );
        $routeParameters = $request->attributes->get('_route_params');
        //var_dump($routeParameters['cardId']);
        $response=$this->serviceHandler->getOneCard($routeParameters['cardId']);
        return new JsonResponse(
            $response,
            JsonResponse::HTTP_OK
        );
    }

    public function getPayInById(Request $request){
        $data = json_decode(
            $request->getContent(),
            true
        );
        $routeParameters = $request->attributes->get('_route_params');
        //var_dump($routeParameters['transactionId']);
        $response=$this->serviceHandler->getPayIn($routeParameters['transactionId']);
        return new JsonResponse(
            $response,
            JsonResponse::HTTP_OK
        );
    }

    public function createWalletHotel(Request $request){
        $data = json_decode(
            $request->getContent(),
            true
        );
        $routeParameters = $request->attributes->get('_route_params');
        $rec=$this->getDoctrine()
            ->getRepository(ServiceHotelier::class)
            ->findOneBySomeField($routeParameters['id']);
        // var_dump($data['name'].$data['currency']);
        if ($request->getMethod() == 'POST') {
            $response=$this->serviceHandler->CreateWallet($data['currency'],$data['name'],$data['idowner']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rec);
            $rec->setWalletId($response);
            $entityManager->flush();
            return new JsonResponse(
                $response,
                JsonResponse::HTTP_CREATED
            );
        }
    }
    public function createWalletResto(Request $request){
        $data = json_decode(
            $request->getContent(),
            true
        );
        $routeParameters = $request->attributes->get('_route_params');
        $rec=$this->getDoctrine()
            ->getRepository(ServiceRestauration::class)
            ->findOneBySomeField($routeParameters['id']);
        // var_dump($data['name'].$data['currency']);
        if ($request->getMethod() == 'POST') {
            $response=$this->serviceHandler->CreateWallet($data['currency'],$data['name'],$data['idowner']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rec);
            $rec->setWalletId($response);
            $entityManager->flush();
            return new JsonResponse(
                $response,
                JsonResponse::HTTP_CREATED
            );
        }
    }
    public function createWalletTransport(Request $request){
        $data = json_decode(
            $request->getContent(),
            true
        );
        $routeParameters = $request->attributes->get('_route_params');
        $rec=$this->getDoctrine()
            ->getRepository(ServiceTransport::class)
            ->findOneBySomeField($routeParameters['id']);
        // var_dump($data['name'].$data['currency']);
        if ($request->getMethod() == 'POST') {
            $response=$this->serviceHandler->CreateWallet($data['currency'],$data['name'],$data['idowner']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rec);
            $rec->setWalletId($response);
            $entityManager->flush();
            return new JsonResponse(
                $response,
                JsonResponse::HTTP_CREATED
            );
        }
    }
    public function createWalletMonumentes(Request $request){
        $data = json_decode(
            $request->getContent(),
            true
        );
        $routeParameters = $request->attributes->get('_route_params');
        $rec=$this->getDoctrine()
            ->getRepository(ServiceDesMonuments::class)
            ->findOneBySomeField($routeParameters['id']);
        // var_dump($data['name'].$data['currency']);
        if ($request->getMethod() == 'POST') {
            $response=$this->serviceHandler->CreateWallet($data['currency'],$data['name'],$data['idowner']);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rec);
            $rec->setWalletId($response);
            $entityManager->flush();
            return new JsonResponse(
                $response,
                JsonResponse::HTTP_CREATED
            );
        }
    }
    public function CreateUserPayment(Request $request){
        $userInterface = $this->security->getUser();
        $routeParameters = $request->attributes->get('_route_params');
        //var_dump($userInterface->getUsername());
        $user=$this->getDoctrine()
            ->getRepository(Client::class)
            ->findOneBySomeField($routeParameters['id']);
        //$user=$em->getRepository(Userd::class)->findOneBySomeField(9);
        var_dump($user->getNom());
        $response=$this->serviceHandler->getMangoUser($user);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        var_dump($response);
        $user->setMangopayid($response->Id);
        $entityManager->flush();
        return new JsonResponse(
            $response,
            JsonResponse::HTTP_OK
        );
    }











}

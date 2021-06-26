<?php


namespace App\Controller;
use App\Entity\Client;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\Form;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\Mango;

class CreateUserMango extends AbstractController

{
    public $serviceHandler;
    private $security;

    public function __construct(Mango $serviceHandler,Security $security,ParameterBagInterface $params )
    {
        $serviceHandler= new Mango($params);
        $this->security = $security;
        $this->serviceHandler=$serviceHandler;

    }

}
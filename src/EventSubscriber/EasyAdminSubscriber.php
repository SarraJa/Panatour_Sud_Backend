<?php
namespace App\EventSubscriber;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\Client as TestClient;
use App\Entity\Client;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    //private $slugger;

    public function __construct()
    {
       // $this->slugger = $slugger;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setClientTime'],
        ];
    }

    public function setClientTime(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Client)) {
            return;
        }
         $now  =new DateTime('now');
         $entity->setCreatedAt($now);
      //  $this->CreatedAt = new \DateTime();

    
    }
}
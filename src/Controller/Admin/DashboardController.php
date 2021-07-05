<?php

namespace App\Controller\Admin;

use App\Entity\ServiceDesMonuments;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Client;
use App\Entity\Facture;
use App\Entity\Reclamation;
use App\Entity\Reservation;
use App\Entity\ServiceHotelier;
use App\Entity\ServiceRestauration;
use App\Entity\ServiceTransport;
use App\Entity\LieuInteret;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
         return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Backendpanatoursud');
    }

    public function configureMenuItems(): iterable
    {
       // yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToCrud('Users', 'fa fa-lock', User::class),
             MenuItem::linkToCrud('Clients', 'fa fa-user', Client::class),
            MenuItem::linkToCrud('Factures', 'fa fa-user', Facture::class),
            MenuItem::linkToCrud('Lieu Interet', 'fa fa-map', LieuInteret::class),
            MenuItem::linkToCrud('Reclamations', 'fa fa-user', Reclamation::class),
            MenuItem::linkToCrud('Reservations', 'fa fa-user', Reservation::class),
            MenuItem::linkToCrud('Service Transport', 'fa fa-bus ', ServiceTransport::class),
            MenuItem::linkToCrud('Services Hotelier', 'fa fa-bed', ServiceHotelier::class),
            MenuItem::linkToCrud('Services Des Monuments', 'fa fa-map', ServiceDesMonuments::class),
            MenuItem::linkToCrud('Service Restauration', 'fa fa-cutlery', ServiceRestauration::class),
            
        ];
    }
}

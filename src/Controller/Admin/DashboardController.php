<?php

namespace App\Controller\Admin;

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
             MenuItem::linkToCrud('Clients', 'fa fa-user', Client::class),
            MenuItem::linkToCrud('Factures', 'fa fa-user', Facture::class),
            MenuItem::linkToCrud('Lieu Interet', 'fa fa-user', LieuInteret::class),
            MenuItem::linkToCrud('Reclamations', 'fa fa-user', Reclamation::class),
            MenuItem::linkToCrud('Reservations', 'fa fa-user', Reservation::class),
            MenuItem::linkToCrud('Service Transport', 'fa fa-user', ServiceTransport::class),
            MenuItem::linkToCrud('Services Hotelier', 'fa fa-user', ServiceHotelier::class),
            MenuItem::linkToCrud('Service Restauration', 'fa fa-user', ServiceRestauration::class),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        ];
    }
}

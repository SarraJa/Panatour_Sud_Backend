<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use App\Entity\Reservation;
use App\Form\ClientTypeFormType ;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;



class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }


    public function configureFields(string $pageName): iterable
    {

                     
        return [
            
            TextField::new('duree'),
            DateTimeField::new('dateReservation'),
        // CollectionField::new('client')->setEntryType(ClientTypeFormType::class)
           AssociationField::new('client'),
           AssociationField::new('serviceTransport'),
           AssociationField::new('serviceHotelier'),
           AssociationField::new('serviceRestauration'),
           IntegerField::new('nombreChamber'),
           IntegerField::new('nombreAdulte'),
           IntegerField::new('nombreEnfant'),
           DateTimeField::new('checkIn'),
           DateTimeField::new('checkOut'),


           
          DateTimeField::new('CreatedAt'),
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
    
}

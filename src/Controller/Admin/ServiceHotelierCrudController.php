<?php

namespace App\Controller\Admin;

use App\Entity\ServiceHotelier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;


class ServiceHotelierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceHotelier::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('Id'),
            TextField::new('libele'),
            TextField::new('type'),
            TextField::new('adresse'),
            TextField::new('description'),
            MoneyField::new('prix')->setCurrency('TND'),
            DateTimeField::new('CreatedAt'),
        ];
    }

}

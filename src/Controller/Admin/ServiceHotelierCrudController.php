<?php

namespace App\Controller\Admin;

use App\Entity\ServiceHotelier;
use App\Form\ImageFormType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField ;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
//use Symfony\Component\Form\Extension\Core\Type\CollectionField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;

use EasyCorp\Bundle\EasyAdminBundle\Config\Action;



class ServiceHotelierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceHotelier::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('Id')->onlyOnIndex(),

            TextField::new('libele'),
            TextField::new('type'),
            TextField::new('adresse'),
            TextField::new('latitude'),
            TextField::new('longitude'),
            AssociationField::new('lieuInteret'),
            TextareaField::new('description'),
            TextField::new('etoiles'),
            MoneyField::new('prix')->setCurrency('TND'),
            DateTimeField::new('CreatedAt'),
            TextField::new('walletId'),
            //TextField::new('imageFile',"Image  ")->setFormType(VichImageType::class)->onlyWhenCreating(),
            CollectionField::new('images')
                ->setEntryType(ImageFormType::class)
                ->setFormTypeOption('by_reference',false),


            
            CollectionField::new('images')->onlyOnDetail()->setTemplatePath('images.html.twig'),
            AssociationField::new('reservations')->onlyOnDetail()
            //ImageField::new('images')->onlyOnDetail(),
        ];
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('adresse')
            ->add('type')
            ->add('latitude')
            ->add('longitude')
            
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

}

<?php

namespace App\Controller\Admin;

use App\Entity\ServiceTransport;
use App\Form\ImageFormType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField as FieldCollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField ;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;




class ServiceTransportCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceTransport::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('Id')->onlyOnIndex(),
            TextField::new('libele'),
            TextField::new('type'),
            TextField::new('adresse'),
            NumberField::new('latitude'),
            NumberField::new('longitude'),
            AssociationField::new('lieuInteret'),
            TextareaField::new('description'),
            MoneyField::new('prix')->setCurrency('TND'),
            DateTimeField::new('CreatedAt'),
            CollectionField::new('images')
            ->setEntryType(ImageFormType::class)
            ->setFormTypeOption('by_reference',false),
           
        
             CollectionField::new('images')->onlyOnDetail()->setTemplatePath('images.html.twig'),
             AssociationField::new('reservations')->onlyOnDetail(),

    

            // FieldCollectionField::new('imageFile')->setEntryType(ServiceTransportImageType::class)->onlyOnForms(),

            // ImageField::new('file')->setBasePath('/uploads/imageservices/')->onlyOnIndex()
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

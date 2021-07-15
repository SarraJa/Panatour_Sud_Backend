<?php


namespace App\Controller\Admin;

use App\Entity\ServiceDesMonuments;
use App\Form\ImageFormType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class ServiceDesMonumentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceDesMonuments::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('Id')->onlyOnIndex(),
            TextField::new('epoque'),
            TextareaField::new('description'),
            TextField::new('libele'),
            TextField::new('adresse'),
            NumberField::new('latitude'),
            NumberField::new('longitude'),
            AssociationField::new('lieuInteret'),

            DateTimeField::new('CreatedAt'),
            TextField::new('type'),

           // MoneyField::new('prix')->setCurrency('TND'),
            //TextField::new('imageFile',"Image  ")->setFormType(VichImageType::class)->onlyWhenCreating(),
            CollectionField::new('images')
                ->setEntryType(ImageFormType::class)
                ->setFormTypeOption('by_reference',false)
                ->onlyOnForms(),


            CollectionField::new('images')->onlyOnDetail()->setTemplatePath('images.html.twig'),
            //ImageField::new('file')->setBasePath('/uploads/imageservices/')->onlyOnIndex()
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

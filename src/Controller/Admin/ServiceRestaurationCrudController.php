<?php

namespace App\Controller\Admin;

use App\Entity\ServiceRestauration;
use App\Form\ImageFormType;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField ;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;

class ServiceRestaurationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceRestauration::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('Id')->onlyOnIndex(),
            TextField::new('libele'),
            //TextField::new('type'),
            TextField::new('adresse'),
            TextField::new('description'),
            MoneyField::new('prix')->setCurrency('TND'),
            DateTimeField::new('CreatedAt'),
           
            CollectionField::new('images')
                ->setEntryType(ImageFormType::class)
                ->setFormTypeOption('by_reference',false)
                ->onlyOnForms(),
               
            
            CollectionField::new('images')->onlyOnDetail()->setTemplatePath('images.html.twig'),
            AssociationField::new('reservations'),
             //TextField::new('imageFile',"Image  ")->setFormType(VichImageType::class)->onlyWhenCreating(),
            //ImageField::new('file')->setBasePath('/uploads/imageservices/')->onlyOnIndex()
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('adresse')
           
            
        ;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}

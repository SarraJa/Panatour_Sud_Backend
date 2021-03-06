<?php

namespace App\Controller\Admin;

use App\Entity\Reclamation;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class ReclamationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reclamation::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('sujet'),
            TextField::new('description'),
            TextField::new('typeObjet'),
            TextField::new('etat'),
            AssociationField::new('client'),
            AssociationField::new('lieuInteret'),
            DateTimeField::new('CreatedAt'),
        ];
    }
   
}

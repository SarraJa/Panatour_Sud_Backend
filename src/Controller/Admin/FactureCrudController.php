<?php

namespace App\Controller\Admin;

use App\Entity\Facture;
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

class FactureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Facture::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('Id'),
            TextField::new('description'),
            MoneyField::new('prixTotal'),
            DateTimeField::new('CreatedAt'),
            AssociationField::new('reservation'),

            
        ];
    }
   
}

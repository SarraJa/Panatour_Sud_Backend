<?php

namespace App\Controller\Admin;

use App\Entity\LieuInteret;
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


class LieuInteretCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LieuInteret::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('gouvernerat'),
            IntegerField::new('latitude'),
            IntegerField::new('longitude'),
            IntegerField::new('score'),
            DateTimeField::new('CreatedAt'),
            AssociationField::new('clients'),
            AssociationField::new('ServiceTransport'),
            AssociationField::new('ServiceRestauration'),
            AssociationField::new('ServiceHotelier'),
            AssociationField::new('reclamation'),
        ];
    
    }
    
}

<?php

namespace App\Controller\Admin;

use App\Entity\LieuInteret;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;



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
            NumberField::new('latitude'),
            NumberField::new('longitude'),
            IntegerField::new('score'),
            DateTimeField::new('CreatedAt'),
            AssociationField::new('clients'),
            AssociationField::new('ServiceTransport')->onlyOnDetail(),
            AssociationField::new('ServiceRestauration')->onlyOnDetail(),
            AssociationField::new('ServiceHotelier')->onlyOnDetail(),
            AssociationField::new('reclamation'),
        ];
    
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
    
}

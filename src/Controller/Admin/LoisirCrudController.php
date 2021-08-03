<?php

namespace App\Controller\Admin;

use App\Entity\Loisir;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LoisirCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Loisir::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           TextField::new('name'),
           TextField::new('date'),
           TextField::new('adresse'),
           AssociationField::new('category'),
        ];
    }
    
}

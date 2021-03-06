<?php

namespace App\Controller\Admin;

use App\Entity\Detail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DetailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Detail::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}

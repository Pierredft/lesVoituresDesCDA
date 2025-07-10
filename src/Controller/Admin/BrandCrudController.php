<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BrandCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Brand::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('countryOfManufacture'),
            TextField::new('manufacturerName'),
            ImageField::new('image')
                ->setUploadDir('public/images/brand')
                ->setBasePath('images/brand'),
        ];
    }

}

<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Brand;
use App\Entity\Model;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $brands = []; // Initialise le tableau des marques
        // Create a model
        for ($i = 0; $i < 5; $i++) {
        $brand = new Brand();
        $brand->setName('Yamaha');
        $brand->setCountryOfManufacture('Japon');
        $brand->setManufacturerName('Torakusu Yamaha');
        $brand->setImage('https://www.adhesif-boat.fr/584/yamaha.jpg');
        $manager->persist($brand);
        $brands[] = $brand;
        }
        // Create models for each brand
        for ($i=0; $i < 20; $i++) {
        $model = new Model();
        $model->setName('YZF-R1');
        $model->setSerialNumber('SN-4589564
        ' . str_pad($i, 10, '0', STR_PAD_LEFT));
        $model->setDateOfManufacture(new DateTime("2025-07-08 +{$i}
        days"));
        $model->setBrand($brands[$i % 5]);
        $manager->persist($model);

        $manager->flush();
    }
}
}

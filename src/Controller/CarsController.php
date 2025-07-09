<?php

namespace App\Controller;

use App\Entity\Model;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CarsController extends AbstractController
{
    #[Route('/cars', name: 'app_cars')]
    public function index(EntityManagerInterface $em): Response
    {
        $model = $em->getRepository(Model::class)->findAll();
        return $this->render('cars/cars.html.twig', [
            'models' => $model,
        ]);
    }
}

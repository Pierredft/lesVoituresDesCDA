<?php

namespace App\Controller;

use App\Entity\Model;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CarsController extends AbstractController
{
    #[Route('/cars', name: 'app_cars')]
    public function index(EntityManagerInterface $em, PaginatorInterface $paginator, Request $request): Response
    {
        $model = $em->getRepository(Model::class)->findAll();
        $model = $paginator->paginate($model, $request->query->getInt('page', 1), 5);
        return $this->render('cars/cars.html.twig', [
            'models' => $model,
        ]);
    }
}

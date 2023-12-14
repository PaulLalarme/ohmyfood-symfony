<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    public function __construct(
        private bool $isDebug
    )
    {
    }
    #[Route('/homepage', name: 'app_homepage')]
    public function homepage(RestaurantRepository $restaurantRepository): Response
    {

        $restaurants = $restaurantRepository->findAll();

        return $this->render('restaurant/homepage.html.twig', [
            'restaurants' => $restaurants
        ]);
    }
}
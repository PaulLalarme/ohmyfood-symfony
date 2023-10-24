<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class RestaurantController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $restaurants = [
            'restaurant1' => [
                'title' => 'La palette du goût',
                'adresse' => '1 Rue du Languedoc',
                'bgImg' => 'restaurant1'
            ],
            'restaurant2' => [
                'title' => 'Le délice des sens',
                'adresse' => '7 Avenue du Parc',
                'bgImg' => 'restaurant1'
            ],
            'restaurant3' => [
                'title' => 'La note enchantée',
                'adresse' => '6 Faubourg Rivotte',
                'bgImg' => 'restaurant1'
            ],
            'restaurant4' => [
                'title' => 'La note enchantée',
                'adresse' => 'Place Florre',
                'bgImg' => 'restaurant1'
            ]
        ];

        return $this->render('restaurant/homepage.html.twig', [
            'restaurants' => $restaurants,
        ]);
    }

    #[Route('/connect/', name:'app_connect')]
    public function connect(): Response
    {
        return $this->render('pages/connection.html.twig');
    }
}
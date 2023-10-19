<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $dishes = [
            'starter' => [
                'title' => 'Fricassée d\'escargot',
                'subtitle' => 'Au piment d\'Espelette',
                'price' => '25€'
            ],
            'dish' => [
                'title' => 'Foie gras de canard mi-cuit',
                'subtitle' => 'Et ses copeaux de truffe noire',
                'price' => '35€'
            ],
            'dessert' => [
                'title' => 'Paris-Brest',
                'subtitle' => 'Revisité',
                'price' => '18€'
            ]
        ];

        return $this->render('restaurant/homepage.html.twig', [
            'title' => 'À la bonne heure',
            'adress' => '1 Rue du Languedoc',
            'dishes' => $dishes,
            'intro' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur magna sit amet 
            lorem volutpat, quis euismod arcu dictum. Praesent vitae vulputate ipsum, sit amet ornare nisl. 
            Nullam eu pharetra ex. Proin scelerisque justo id nisi ultrices scelerisque. Aenean in pharetra 
            orci. Aenean eu consequat nulla. Vivamus eleifend et lectus ut aliquam. Nunc ipsum dui, blandit 
            ut euismod sit amet, aliquet in risus. Sed'
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug): Response
    {
        $title = u(str_replace('-', '', $slug))->title(true);

        return new Response('Intitulé de plats : ' . $title);
    }
}
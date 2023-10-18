<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('Restaurant : "À la bonne heure"');
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug): Response
    {
        $title = u(str_replace('-', '', $slug))->title(true);

        return new Response('Intitulé de plats : ' . $title);
    }
}
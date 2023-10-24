<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DishesController extends AbstractController
{
    #[Route('/dishes/{id<\d+>}', methods: ['GET'], name: 'app_dishes_getdishes')]
    public function getDishes(int $idRestaurant,int $typeDishes, LoggerInterface $logger): Response
    {
        // TODO query the database
        $dishes = [
            'idRestaurant' => $idRestaurant,
            'typeDishes' => $typeDishes,
        ];

        $logger->info('Retourne une liste de plats par restaurant: {dishes}', [
            'idRestaurant' => $idRestaurant,
            'typeDishes' => $typeDishes,
        ]);

        return $this->json($dishes);
    }
}
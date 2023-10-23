<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DishesController extends AbstractController
{
    #[Route('/dishes/{id<\d+>}', methods: ['GET'])]
    public function getDishes(int $id, LoggerInterface $logger): Response
    {
        // TODO query the database
        $dishes = [
            'id' => $id,
            'name' => 'Poulet rôti',
            'subtitle' => 'Frites fait maison',
        ];

        $logger->info('Retourne une liste de plats par restaurant {dishes}', [
            'dishes' => $id,
        ]);

        return $this->json($dishes);
    }
}
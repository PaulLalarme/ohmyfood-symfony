<?php

namespace App\Controller;

use App\Entity\Dish;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DishController extends AbstractController
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

    #[Route('/dish/new')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        $dish = new Dish();
        $dish->setTitle('Fricassée d\'escargot');
        $dish->setSubtitle('Au piment d\'Espelette ');
        $dish->setType(0);
        $dish->setPrice(25.00);
        $dish->setRate(0.0);
        $entityManager->persist($dish); // surveille l'objet "$dish"
        $entityManager->flush(); // utilise "EntityManagerInterface" pour enregistrer en base à partir de l'objet

        return new Response(sprintf(
            'Plat n° %d de %d',
            $dish->getTitle(),
            $dish->getSubtitle()
        )); // retourne un message
    }
}
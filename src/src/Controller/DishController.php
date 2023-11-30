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
            'id: %d | intitulé: %s',
            $dish->getId(),
            $dish->getTitle()
        )); // retourne un message
    }
}
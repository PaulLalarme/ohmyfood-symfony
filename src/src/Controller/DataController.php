<?php

namespace App\Controller;

use App\Entity\Restaurant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DataController extends AbstractController
{
    #[Route('/restaurant/new')]
    public function new(EntityManagerInterface $entityManager): Response
    {
//        $restaurant = new Restaurant();
//        $restaurant->setName('À la française');
//        $restaurant->setAddress('3 Rue Durer');
//        $restaurant->setThumbnail('ALaFrancaise');
//
//        $entityManager->persist($restaurant);
//        $entityManager->flush();

        return $this->render('pages/generate-code.html.twig');
    }
}
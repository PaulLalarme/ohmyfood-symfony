<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Service\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class RestaurantController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(EntityManagerInterface $entityManager, RestaurantRepository $restaurantRepository): Response
    {
        $restaurantRepository = $entityManager->getRepository(Restaurant::class);
        $restaurants = $restaurantRepository->findAllRestaurants();

        return $this->render('restaurant/homepage.html.twig', [
            'restaurants' => $restaurants
        ]);
    }

    #[Route('/connect/', name:'app_connect')]
    public function connect(): Response
    {
        return $this->render('pages/connection.html.twig');
    }

    #[Route('/restaurant/new')]
    public function new(EntityManagerInterface $entityManager, Request $request): Response
    {
        $restaurant = new Restaurant();
        $restaurant->setName('La palette du goût');
        $restaurant->setAddress('1 Rue du Languedoc');
        $restaurant->setThumbnail('LaPaletteDuGout');
        $restaurant->setRate(5.0);
            $entityManager->persist($restaurant); // surveille l'objet "$restaurant"
            $entityManager->flush(); // utilise "EntityManagerInterface" pour enregistrer en base à partir de l'objet

        return new Response(sprintf(
           'Nom: %s | adresse: %s',
            $restaurant->getName(),
            $restaurant->getAddress()
        )); // retourne un message
    }
}
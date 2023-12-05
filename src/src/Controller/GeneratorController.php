<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GeneratorController extends AbstractController
{
    public function new(Request $request): Response
    {
        // just set up a fresh $task object (remove the example data)
        $dish = new DishController();
        $form = $this->createForm(DishController::class, $dish);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('dish_success');
        }

        return $this->render('task/new.html.twig', [
            'form' => $form,
        ]);
    }
}
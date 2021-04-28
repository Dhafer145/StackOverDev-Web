<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilEncadrantController extends AbstractController
{
    /**
     * @Route("/accueil/encadrant", name="accueil_encadrant")
     */
    public function index(): Response
    {
        return $this->render('accueil_encadrant/index.html.twig', [
            'controller_name' => 'AccueilEncadrantController',
        ]);
    }
}

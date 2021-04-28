<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilResponsableController extends AbstractController
{
    /**
     * @Route("/accueil/responsable", name="accueil_responsable")
     */
    public function index(): Response
    {
        return $this->render('accueil_responsable/index.html.twig', [
            'controller_name' => 'AccueilResponsableController',
        ]);
    }
}

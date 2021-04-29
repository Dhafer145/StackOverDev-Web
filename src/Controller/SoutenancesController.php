<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SoutenancesController extends AbstractController
{
    /**
     * @Route("/soutenance", name="soutenances")
     */
    public function index(): Response
    {
        return $this->render('soutenances/index.html.twig');
    }
}

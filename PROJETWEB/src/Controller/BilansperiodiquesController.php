<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BilansperiodiquesController extends AbstractController
{
    /**
     * @Route("/", name="bilansperiodiques")
     */
    public function index(): Response
    {
        return $this->render('bilansperiodiques/index.html.twig');
    }
}

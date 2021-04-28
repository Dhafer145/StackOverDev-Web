<?php

namespace App\Controller;

use App\Repository\CompteRenduRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteRenduBackController extends AbstractController
{
    /**
     * @Route("/compte/rendu/back", name="compte_rendu_back")
     */
    public function index(CompteRenduRepository $compteRenduRepository): Response
    {
        return $this->render('compte_rendu_back/index.html.twig', [
            'compte_rendus' => $compteRenduRepository->findAll(),
        ]);
    }
}

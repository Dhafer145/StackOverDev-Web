<?php

namespace App\Controller;

use App\Repository\PropositionProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropositionBackController extends AbstractController
{
    /**
     * @Route("/proposition/back", name="proposition_back")
     */
    public function index(PropositionProjetRepository $propositionProjetRepository): Response
    {
        return $this->render('proposition_back/index.html.twig', [
            'proposition_projets' => $propositionProjetRepository->findAll(),
        ]);
    }
}

<?php

namespace App\Controller;


use App\Entity\Soutenance;
use App\Form\SoutenanceType;
use App\Repository\SoutenanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SoutenanceBackController extends AbstractController
{
    /**
     * @Route("/soutenance/back", name="soutenance_back")
     */
    public function index(SoutenanceRepository $soutenanceRepository): Response
    {
        return $this->render('soutenance_back/index.html.twig', [
            'soutenances' => $soutenanceRepository->findAll(),

        ]);
    }
}

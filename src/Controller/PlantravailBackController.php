<?php

namespace App\Controller;

use App\Repository\PlanTravailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PlanTravail;
use App\Form\PlanTravailType;
use Symfony\Component\HttpFoundation\Request;


class PlantravailBackController extends AbstractController
{
    /**
     * @Route("/plantravail/back", name="plantravail_back")
     */
    public function index(PlanTravailRepository $planTravailRepository): Response
    {
        return $this->render('plantravail_back/index.html.twig', [
            'plan_travails' => $planTravailRepository->findAll(),
        ]);
    }
}

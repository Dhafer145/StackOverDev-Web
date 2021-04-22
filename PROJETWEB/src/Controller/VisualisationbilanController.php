<?php

namespace App\Controller;

use App\Entity\Reponses;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VisualisationbilanController extends AbstractController
{
    /**
     * @Route("/visualisationbilan", name="visualisation_bilan")
     */
    public function index(): Response
    {
        $repository= $this->getDoctrine()->getRepository(User::class);
        $users=$repository->findAll();
        $repository1=$this->getDoctrine()->getRepository(Reponses::class);
        $reponses=$repository1->findAll();
        return $this->render('visualisationbilan/index.html.twig',["users"=>$users,"reponses"=>$reponses]);
    }
}

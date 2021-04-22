<?php

namespace App\Controller;

use App\Entity\PropertySearch;
use App\Entity\RendezVous;
use App\Form\PropertySearchType;
use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use Cassandra\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\{TextType,ButtonType,EmailType,HiddenType,PasswordType,TextareaType,SubmitType,NumberType,DateType,MoneyType,BirthdayType};


class AfficherbackController extends AbstractController
{
    /**
     * @Route("/afficherback", name="afficherback")
     */
    public function index(RendezVousRepository $rendezVousRepository): Response
    {
        return $this->render('afficherback/index.html.twig', [
            'rendez_vouses' => $rendezVousRepository->findAll() ]);
    }
}

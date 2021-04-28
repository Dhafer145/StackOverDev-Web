<?php

namespace App\Controller;

use App\Entity\Reponses;
use App\Entity\User;
use App\Repository\QuestionsRepository;
use App\Repository\ReponsesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;


class VisualisationbilanController extends AbstractController
{
    /**
     * @Route("/visualisationbilan", name="visualisation_bilan")
     */
    public function index(): Response
    {
        $repository= $this->getDoctrine()->getRepository(User::class);
        $users=$repository->findUsersByReponses();
        $repository1=$this->getDoctrine()->getRepository(Reponses::class);
        $reponses=$repository1->findAll();
        return $this->render('visualisationbilan/index.html.twig',["users"=>$users,"reponses"=>$reponses]);
    }

    /**
     * @Route("/visualisationbilan/show/{id}", name="visualisation_bilan_show")
     */
    public function show(QuestionsRepository $questionsRepository,UserRepository $userRepository, ReponsesRepository $reponsesRepository, User $id): Response
    {
        $user = $userRepository->find($id);
        $reponse = $reponsesRepository->findBy(['reps_etud' => $user, 'IndexPeriode' => [1]]);


        return $this->render('visualisationbilan/show.html.twig',['reponses' => $reponse]);
    }

    /**
     * @Route("/visualisationbilan/show/{id}/middle", name="visualisation_bilan_show_middle")
     */
    public function showMiddle(QuestionsRepository $questionsRepository,UserRepository $userRepository, ReponsesRepository $reponsesRepository, User $id): Response
    {
        $user = $userRepository->find($id);
        $reponse = $reponsesRepository->findBy(['reps_etud' => $user, 'IndexPeriode' => [2]]);


        return $this->render('visualisationbilan/showMiddle.html.twig',['reponses' => $reponse]);
    }

    /**
     * @Route("/visualisationbilan/show/{id}/end", name="visualisation_bilan_show_end")
     */
    public function showEnd(QuestionsRepository $questionsRepository,UserRepository $userRepository, ReponsesRepository $reponsesRepository, User $id): Response
    {
        $user = $userRepository->find($id);
        $reponse = $reponsesRepository->findBy(['reps_etud' => $user, 'IndexPeriode' => [3]]);


        return $this->render('visualisationbilan/showEnd.html.twig',['reponses' => $reponse]);
    }


}

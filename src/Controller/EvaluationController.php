<?php

namespace App\Controller;

use App\Entity\Evaluation;
use App\Form\EvaluationType;
use App\Repository\EvaluationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * @Route("/evaluation")
 */
class EvaluationController extends Controller
{
    /**
     * @Route("/", name="evaluation_index", methods={"GET"})
     */
    public function index(EvaluationRepository $evaluationRepository): Response
    {
        return $this->render('evaluation/index.html.twig', [
            'evaluations' => $evaluationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="evaluation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $evaluation = new Evaluation();
        $form = $this->createForm(EvaluationType::class, $evaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evaluation);
            $entityManager->flush();

            return $this->redirectToRoute('evaluation_index');
        }

        return $this->render('evaluation/new.html.twig', [
            'evaluation' => $evaluation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evaluation_show", methods={"GET"})
     */
    public function show(Evaluation $evaluation): Response
    {
        return $this->render('evaluation/show.html.twig', [
            'evaluation' => $evaluation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="evaluation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Evaluation $evaluation): Response
    {
        $form = $this->createForm(EvaluationType::class, $evaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evaluation_index');
        }

        return $this->render('evaluation/edit.html.twig', [
            'evaluation' => $evaluation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evaluation_delete", methods={"POST"})
     */
    public function delete(Request $request, Evaluation $evaluation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evaluation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($evaluation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('evaluation_index');
    }


    /**
     * @Route("datetriasc",name="datetriasc")
     */
    public function triasc(EvaluationRepository $repo,Request $request){
        $evaluation =$repo->triasc() ;
        return $this->render('evaluation/index.html.twig', [
            'evaluations' => $evaluation,
        ]);
    }

    /**
     * @Route("datetridesc",name="datetridesc")
     */
    public function tridesc(EvaluationRepository $repo,Request $request){
        $evaluation =$repo->tridesc() ;
        return $this->render('evaluation/index.html.twig', [
            'evaluations' => $evaluation,
        ]);
    }


    /**
     * @Route("/evaluation/back", name="evaluation_back", methods={"GET"})
     */
    public function evaluationback(EvaluationRepository $evaluationRepository, Request $request): Response
    {

        $paginator  = $this->get('knp_paginator');
        $ev = $paginator->paginate(
            $evaluationRepository->findAll(),
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('evaluation/evaluationback.html.twig', [
            'evaluations' => $ev,
        ]);
    }


    /**
     * @Route("/{id}/back", name="evaluation_show_back", methods={"GET"})
     */
    public function showback(Evaluation $evaluation): Response
    {
        return $this->render('evaluation/showback.html.twig', [
            'evaluation' => $evaluation,
        ]);
    }



}

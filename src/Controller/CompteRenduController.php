<?php

namespace App\Controller;

use App\Entity\CompteRendu;
use App\Form\CompteRenduType;
use App\Repository\CompteRenduRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/compte/rendu")
 */
class CompteRenduController extends Controller
{
    /**
     * @Route("/", name="compte_rendu_index", methods={"GET"})
     */
    public function index(CompteRenduRepository $compteRenduRepository, Request $request): Response
    {



        $paginator  = $this->get('knp_paginator');
        $c = $paginator->paginate(
            $compteRenduRepository->findAll(),
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('consulter_cr/index.html.twig', [
            'compte_rendus' => $c,
        ]);
    }

    /**
     * @Route("/new", name="compte_rendu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $compteRendu = new CompteRendu();
        $form = $this->createForm(CompteRenduType::class, $compteRendu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($compteRendu);
            $entityManager->flush();

            return $this->redirectToRoute('compte_rendu_index');
        }

        return $this->render('compte_rendu/new.html.twig', [
            'compte_rendu' => $compteRendu,
            'form' => $form->createView(),
        ]);
    }

    /* encadraaaantttt */

    /**
     * @Route("/encadrant", name="compte_rendu_index_encadrant", methods={"GET"})
     */
    public function index1(CompteRenduRepository $compteRenduRepository): Response
    {
        return $this->render('consulter_cr/index_encadrant.html.twig', [
            'compte_rendus' => $compteRenduRepository->findAll(),
        ]);
    }

    /**
     * @Route("/encadrant_validee/{id}", name="valider_compte_rendu", methods={"GET"})
     */

    public function changerEtatAction($id,CompteRenduRepository $repository)
    {
        $em = $this->getDoctrine()->getManager();
        $comptes=$repository->find($id);
        $comptes_rendus=$repository->findAll();
        $comptes->setValidationcr("valide");
        $em->persist($comptes);
        $em->flush();
        $this->redirectToRoute('compte_rendu_index_encadrant');
        return $this->render('consulter_cr/index_encadrant.html.twig',[
            'compte_rendus'=>$comptes_rendus
        ]);

    }

    /**
     * @Route("/encadrant_refuse/{id}", name="refuser_compte_rendu", methods={"GET"})
     */

    public function changerEtatAction2($id,CompteRenduRepository $repository)
    {
        $em = $this->getDoctrine()->getManager();
        $comptes=$repository->find($id);
        $comptes_rendus=$repository->findAll();
        $comptes->setValidationcr("refuse");
        $em->persist($comptes);
        $em->flush();
        $this->redirectToRoute('compte_rendu_index_encadrant');
        return $this->render('consulter_cr/index_encadrant.html.twig',[
            'compte_rendus'=>$comptes_rendus
        ]);

    }


}

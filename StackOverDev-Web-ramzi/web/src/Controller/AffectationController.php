<?php

namespace App\Controller;

use App\Entity\Affectation;
use App\Form\AffectationType;
use App\Repository\AffectationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/affectation")
 */
class AffectationController extends AbstractController
{
    /**
     * @Route("/", name="affectation_index", methods={"GET"})
     */
    public function index(AffectationRepository $affectationRepository): Response
    {
        return $this->render('affectation/index.html.twig', [
            'affectations' => $affectationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="affectation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $affectation = new Affectation();
        $form = $this->createForm(AffectationType::class, $affectation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($affectation);
            $entityManager->flush();

            return $this->redirectToRoute('affectation_index');
        }

        return $this->render('affectation/new.html.twig', [
            'affectation' => $affectation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="affectation_show", methods={"GET"})
     */
    public function show(Affectation $affectation): Response
    {
        return $this->render('affectation/show.html.twig', [
            'affectation' => $affectation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="affectation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Affectation $affectation): Response
    {
        $form = $this->createForm(AffectationType::class, $affectation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('affectation_index');
        }

        return $this->render('affectation/edit.html.twig', [
            'affectation' => $affectation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="affectation_delete", methods={"POST"})
     */
    public function delete(Request $request, Affectation $affectation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$affectation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($affectation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('affectation_index');
    }




}

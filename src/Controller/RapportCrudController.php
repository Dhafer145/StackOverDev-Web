<?php

namespace App\Controller;

use App\Entity\RapportFinal;
use App\Entity\RecherPlagiat;
use App\Form\RapportFinalType;
use App\Repository\RapportFinalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rapport/crud")
 */
class RapportCrudController extends AbstractController
{


    /**
     * @Route("/", name="rapport_crud_index", methods={"GET"})
     */
    public function index(RapportFinalRepository $rapportFinalRepository): Response
    {
        return $this->render('rapport_crud/index.html.twig', [
            'rapport_finals' => $rapportFinalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rapport_crud_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rapportFinal = new RapportFinal();
        $form = $this->createForm(RapportFinalType::class, $rapportFinal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rapportFinal);
            $entityManager->flush();

            return $this->redirectToRoute('rapport_crud_index');
        }

        return $this->render('rapport_crud/new.html.twig', [
            'rapport_final' => $rapportFinal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="rapport_crud_show", methods={"GET"})
     */
    public function show(RapportFinal $rapportFinal): Response
    {
        return $this->render('rapport_crud/show.html.twig', [
            'rapport_final' => $rapportFinal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rapport_crud_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RapportFinal $rapportFinal): Response
    {
        $form = $this->createForm(RapportFinalType::class, $rapportFinal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rapport_crud_index');
        }

        return $this->render('rapport_crud/edit.html.twig', [
            'rapport_final' => $rapportFinal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="rapport_crud_delete", methods={"POST"})
     */
    public function delete(Request $request, RapportFinal $rapportFinal): Response
    {
        if ($this->isCsrfTokenValid('delete' . $rapportFinal->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rapportFinal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rapport_crud_index');
    }

    /**
     * @Route("/Rapport_plagiat/", name="Rapport_par_plagiat")
     * Method({"GET"})
     */
    public function RapportParPlagiat(Request $request)
    {

        $recherplagiat = new RecherPlagiat();
        $form = $this->createForm(RecherPlagiat::class, $recherplagiat);
        $form->handleRequest($request);

        $rapport_final = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $minPlagiat = $recherplagiat->getMinPlagiat();
            $maxPlagiat = $recherplagiat->getMaxPlagiat();

            $rapport_final = $this->getDoctrine()->getRepository(RapportFinal::class)->findByPlagiatRange($minPlagiat, $maxPlagiat);
        }

        return $this->render('rapport_crud/RapportParPrix.html.twig', ['form' => $form->createView(), 'rapport_final' => $rapport_final]);

    }
}
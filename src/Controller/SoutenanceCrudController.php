<?php

namespace App\Controller;

use App\Entity\Soutenance;
use App\Form\SoutenanceType;
use App\Repository\SoutenanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/soutenance/crud")
 */
class SoutenanceCrudController extends AbstractController
{
    /**
     * @Route("/", name="soutenance_crud_index", methods={"GET"})
     */
    public function index(SoutenanceRepository $soutenanceRepository): Response
    {
        return $this->render('soutenance_crud/index.html.twig', [
            'soutenances' => $soutenanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="soutenance_crud_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $soutenance = new Soutenance();
        $form = $this->createForm(SoutenanceType::class, $soutenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($soutenance);
            $entityManager->flush();

            return $this->redirectToRoute('soutenance_crud_index');
        }

        return $this->render('soutenance_crud/new.html.twig', [
            'soutenance' => $soutenance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="soutenance_crud_show", methods={"GET"})
     */
    public function show(Soutenance $soutenance): Response
    {
        return $this->render('soutenance_crud/show.html.twig', [
            'soutenance' => $soutenance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="soutenance_crud_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Soutenance $soutenance): Response
    {
        $form = $this->createForm(SoutenanceType::class, $soutenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('soutenance_crud_index');
        }

        return $this->render('soutenance_crud/edit.html.twig', [
            'soutenance' => $soutenance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="soutenance_crud_delete", methods={"POST"})
     */
    public function delete(Request $request, Soutenance $soutenance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$soutenance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($soutenance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('soutenance_crud_index');
    }
}

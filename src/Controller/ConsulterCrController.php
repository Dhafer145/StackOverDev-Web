<?php

namespace App\Controller;

use App\Entity\CompteRendu;
use App\Form\CompteRenduType;
use App\Repository\CompteRenduRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/consulter/cr")
 */
class ConsulterCrController extends AbstractController
{
    /**
     * @Route("/", name="consulter_cr_index", methods={"GET"})
     */
    public function index(CompteRenduRepository $compteRenduRepository): Response
    {
        return $this->render('consulter_cr/index.html.twig', [
            'compte_rendus' => $compteRenduRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="consulter_cr_new", methods={"GET","POST"})
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

            return $this->redirectToRoute('consulter_cr_index');
        }

        return $this->render('consulter_cr/new.html.twig', [
            'compte_rendu' => $compteRendu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consulter_cr_show", methods={"GET"})
     */
    public function show(CompteRendu $compteRendu): Response
    {
        return $this->render('consulter_cr/show.html.twig', [
            'compte_rendu' => $compteRendu,
        ]);
    }




}

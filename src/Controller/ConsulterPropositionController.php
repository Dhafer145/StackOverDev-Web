<?php

namespace App\Controller;

use App\Entity\PropositionProjet;
use App\Form\PropositionProjetType;
use App\Repository\PropositionProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/consulter/proposition")
 */
class ConsulterPropositionController extends AbstractController
{
    /**
     * @Route("/", name="consulter_proposition_index", methods={"GET"})
     */
    public function index(PropositionProjetRepository $propositionProjetRepository): Response
    {
        return $this->render('consulter_proposition/index.html.twig', [
            'proposition_projets' => $propositionProjetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="consulter_proposition_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $propositionProjet = new PropositionProjet();
        $form = $this->createForm(PropositionProjetType::class, $propositionProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($propositionProjet);
            $entityManager->flush();

            return $this->redirectToRoute('consulter_proposition_index');
        }

        return $this->render('consulter_proposition/new.html.twig', [
            'proposition_projet' => $propositionProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consulter_proposition_show", methods={"GET"})
     */
    public function show(PropositionProjet $propositionProjet): Response
    {
        return $this->render('consulter_proposition/show.html.twig', [
            'proposition_projet' => $propositionProjet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="consulter_proposition_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PropositionProjet $propositionProjet): Response
    {
        $form = $this->createForm(PropositionProjetType::class, $propositionProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('consulter_proposition_index');
        }

        return $this->render('consulter_proposition/edit.html.twig', [
            'proposition_projet' => $propositionProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consulter_proposition_delete", methods={"POST"})
     */
    public function delete(Request $request, PropositionProjet $propositionProjet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$propositionProjet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($propositionProjet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('consulter_proposition_index');
    }
}

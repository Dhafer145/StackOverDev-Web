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
 * @Route("/proposition/projet")
 */
class PropositionProjetController extends AbstractController
{
    /**
     * @Route("/", name="proposition_projet_index", methods={"GET"})
     */
    public function index(PropositionProjetRepository $propositionProjetRepository): Response
    {
        return $this->render('proposition_projet/index.html.twig', [
            'proposition_projets' => $propositionProjetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="proposition_projet_new", methods={"GET","POST"})
     */
    public function new(Request $request, \Swift_Mailer $mailer): Response
    {
        $propositionProjet = new PropositionProjet();
        $form = $this->createForm(PropositionProjetType::class, $propositionProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($propositionProjet);
            $entityManager->flush();

            $message=(new \Swift_Message('Information'))
                ->setFrom("azeaz@azeaz.com")
                ->setTo($propositionProjet->getEtudiantpp()->getEmail())
                ->setBody("Une proposition de projet a été ajoutée portant le nom de ce sujet : ".$propositionProjet->getNomSujet()." ajoutée par l'étudiant: ".$propositionProjet->getEtudiantpp()->getUserName(),
                    'text/html'
                );
            $mailer->send($message);
            return $this->redirectToRoute('proposition_projet_index');




        }

        return $this->render('proposition_projet/new.html.twig', [
            'proposition_projet' => $propositionProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proposition_projet_show", methods={"GET"})
     */
    public function show(PropositionProjet $propositionProjet): Response
    {
        return $this->render('proposition_projet/show.html.twig', [
            'proposition_projet' => $propositionProjet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="proposition_projet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PropositionProjet $propositionProjet): Response
    {
        $form = $this->createForm(PropositionProjetType::class, $propositionProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proposition_projet_index');
        }

        return $this->render('proposition_projet/edit.html.twig', [
            'proposition_projet' => $propositionProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proposition_projet_delete", methods={"POST"})
     */
    public function delete(Request $request, PropositionProjet $propositionProjet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$propositionProjet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($propositionProjet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('proposition_projet_index');
    }


}

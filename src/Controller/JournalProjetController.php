<?php

namespace App\Controller;

use App\Entity\JournalProjet;
use App\Form\JournalProjetType;
use App\Repository\JournalProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/journal/projet")
 */
class JournalProjetController extends AbstractController
{
    /**
     * @Route("/", name="journal_projet_index", methods={"GET"})
     */
    public function index(JournalProjetRepository $journalProjetRepository): Response
    {
        return $this->render('journal_projet/index.html.twig', [
            'journal_projets' => $journalProjetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="journal_projet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $journalProjet = new JournalProjet();
        $form = $this->createForm(JournalProjetType::class, $journalProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($journalProjet);
            $entityManager->flush();

            return $this->redirectToRoute('journal_projet_index');
        }

        return $this->render('journal_projet/new.html.twig', [
            'journal_projet' => $journalProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="journal_projet_show", methods={"GET"})
     */
    public function show(JournalProjet $journalProjet): Response
    {
        return $this->render('journal_projet/show.html.twig', [
            'journal_projet' => $journalProjet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="journal_projet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, JournalProjet $journalProjet): Response
    {
        $form = $this->createForm(JournalProjetType::class, $journalProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('journal_projet_index');
        }

        return $this->render('journal_projet/edit.html.twig', [
            'journal_projet' => $journalProjet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="journal_projet_delete", methods={"POST"})
     */
    public function delete(Request $request, JournalProjet $journalProjet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$journalProjet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($journalProjet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('journal_projet_index');
    }


    /**
     * @Route("/searcheajax ", name="ajaxsearch")
     */
    public function searchajax(Request $request,JournalProjetRepository $repository)
    {
        $repository = $this->getDoctrine()->getRepository(JournalProjet::class);
        $requestString=$request->get('searchValue');
        $journals = $repository->findjournalbyname($requestString);

        return $this->render('journal_projet/journal_ajax.html.twig', [
            "journal_projets"=>$journals
        ]);
    }

    /**
     * @Route("/journaltriecroissant ", name="trie_croissant")
     */

    public function trie_croissant(JournalProjetRepository $repository)
    {
        $repository = $this->getDoctrine()->getRepository(JournalProjet::class);
        $journals = $repository->triecroissant();
        return $this->render('journal_projet/index.html.twig', [
            "journal_projets"=>$journals
        ]);
    }

    /**
     * @Route("/journaltriedecroissant ", name="trie_decroissant")
     */

    public function trie_decroissant(JournalProjetRepository $repository)
    {
        $repository = $this->getDoctrine()->getRepository(JournalProjet::class);
        $journals = $repository->triedecroissant();
        return $this->render('journal_projet/index.html.twig', [
            "journal_projets"=>$journals
        ]);
    }
}

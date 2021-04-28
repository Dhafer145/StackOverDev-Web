<?php

namespace App\Controller;

use App\Entity\JournalProjet;
use App\Repository\JournalProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JournalEncadrantController extends AbstractController
{
    /**
     * @Route("/journal/encadrant", name="journal_encadrant")
     */
    public function index(JournalProjetRepository $journalProjetRepository): Response
    {
        return $this->render('journal_encadrant/index.html.twig', [
            'journal_projets' => $journalProjetRepository->findAll(),
        ]);
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

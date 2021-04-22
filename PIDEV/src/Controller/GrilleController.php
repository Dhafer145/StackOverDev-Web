<?php

namespace App\Controller;

use App\Entity\Grille;
use App\Form\GrilleType;
use App\Repository\GrilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/grille")
 */
class GrilleController extends AbstractController
{
    /**
     * @Route("/", name="grille_index", methods={"GET"})
     */
    public function index(GrilleRepository $grilleRepository): Response
    {
        return $this->render('grille/index.html.twig', [
            'grilles' => $grilleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="grille_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $grille = new Grille();
        $form = $this->createForm(GrilleType::class, $grille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($grille);
            $entityManager->flush();

            return $this->redirectToRoute('grille_index');
        }

        return $this->render('grille/new.html.twig', [
            'grille' => $grille,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="grille_show", methods={"GET"})
     */
    public function show(Grille $grille): Response
    {
        return $this->render('grille/show.html.twig', [
            'grille' => $grille,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="grille_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Grille $grille): Response
    {
        $form = $this->createForm(GrilleType::class, $grille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('grille_index');
        }

        return $this->render('grille/edit.html.twig', [
            'grille' => $grille,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="grille_delete", methods={"POST"})
     */
    public function delete(Request $request, Grille $grille): Response
    {
        if ($this->isCsrfTokenValid('delete' . $grille->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($grille);
            $entityManager->flush();
        }

        return $this->redirectToRoute('grille_index');
    }


    /**
         * @Route("/grille/recherche", name="recherche")
     */
    public function recherche(GrilleRepository $repo, Request $request)
    {
        $data = $request->get("search");
        $grille = $repo->findBy(["mention" => $data]);

        return $this->render('grille/index.html.twig', [
            'grilles' => $grille,
        ]);
    }
    /**
     * @Route("triasc",name="triasc")
     */
    public function triasc(GrilleRepository $repo,Request $request){
        $grille =$repo->triasc() ;
        return $this->render('grille/index.html.twig', [
            'grilles' => $grille,
        ]);
    }
    /**
     * @Route("tridesc",name="tridesc")
     */
    public function tridesc(GrilleRepository $repo,Request $request){
        $grille =$repo->tridesc() ;
        return $this->render('grille/index.html.twig', [
            'grilles' => $grille,
        ]);
    }



    /**
     * @Route("/grille/back", name="grille_back", methods={"GET"})
     */
    public function grilleback(GrilleRepository $grilleRepository): Response
    {
        return $this->render('grille/grilleback.html.twig', [
            'grilles' => $grilleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}/back", name="grille_show_back", methods={"GET"})
     */
    public function showback(Grille $grille): Response
    {
        return $this->render('grille/showback.html.twig', [
            'grille' => $grille,
        ]);
    }

}

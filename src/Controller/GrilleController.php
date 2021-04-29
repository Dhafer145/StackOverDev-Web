<?php

namespace App\Controller;

use App\Entity\Grille;
use App\Form\GrilleType;
use App\Repository\GrilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// Include Dompdf required namespaces
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * @Route("/grille")
 */
class GrilleController extends Controller
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
    public function new(Request $request,\Swift_Mailer $mailer): Response
    {
        $grille = new Grille();
        $form = $this->createForm(GrilleType::class, $grille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($grille);
            $entityManager->flush();

            $message=(new \Swift_Message('Information'))
                ->setFrom("azeaz@azeaz.com")
                ->setTo($grille->getEncAcademique()->getEmail())
                ->setBody("Vous avez rempli la grille de l'etudiant : ".$grille->getGrilleEtudiant()->getUserName()."",
                'text/html'
        );
            $mailer->send($message);
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
    public function grilleback(GrilleRepository $grilleRepository, Request $request): Response
    {


        $paginator  = $this->get('knp_paginator');
        $grille = $paginator->paginate(
            $grilleRepository->findAll(),
            $request->query->getInt('page', 1),
            4
        );


        return $this->render('grille/grilleback.html.twig', [
            'grilles' => $grille,
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

    /**
     * @Route("/grilleimprime/{id}", name="grille_imprime")
     */
    public function grilleimprim(Grille $grille): Response
    {

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('grille/grille_imprime.html.twig', [
            'grille' => $grille,
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("grille.pdf", [
            "Attachment" => false
        ]);
        return $this->render('grille/grille_imprime.html.twig', [
            'grille' => $grille,
        ]);
    }



}

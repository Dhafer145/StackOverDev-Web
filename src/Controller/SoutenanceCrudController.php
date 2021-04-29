<?php

namespace App\Controller;

use App\Entity\PresidentSearch;
use App\Entity\Soutenance;
use App\Form\PresidentSearchType;
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
     * @Route("/", name="soutenance_crud_index", methods={"GET","Post"})
     */
    public function index(Request $request)
    {
        $presidentsearch = new PresidentSearch();
        $form = $this->createForm(PresidentSearchType::class,$presidentsearch);
        $form->handleRequest($request);

        $soutenance= [];

        if($form->isSubmitted() && $form->isValid()) {
            $president = $presidentsearch->getPresident();
            if ($president!="")
                $soutenance= $this->getDoctrine()->getRepository(Soutenance::class)->findBy(['president' => $president] );
            else
                $soutenance= $this->getDoctrine()->getRepository(Soutenance::class)->findAll();
        }
        return $this->render('soutenance_crud/index.html.twig', [ 'form' =>$form->createView(),
            'soutenances' => $soutenance]);
    }

    /**
     * @Route("/new", name="soutenance_crud_new", methods={"GET","POST"})
     */
    public function new(Request $request ,\Swift_Mailer $mailer ): Response
    {
        $soutenance = new Soutenance();
        $form = $this->createForm(SoutenanceType::class, $soutenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($soutenance);
            $entityManager->flush();


            $message=(new \Swift_Message('soutenance'))
                ->setFrom("azeaz@azeaz.com")
                ->setTo($soutenance->getSoutEtud()->getEmail())


                ->setBody("votre soutenance a été ajouté ",
                    'text/html');

            $mailer->send($message);



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

<?php

namespace App\Controller;

use App\Entity\PlanTravail;
use App\Form\PlanTravailType;
use App\Repository\PlanTravailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/plan/travail")
 */
class PlanTravailController extends AbstractController
{
    /**
     * @Route("/", name="plan_travail_index", methods={"GET"})
     */
    public function index(PlanTravailRepository $planTravailRepository): Response
    {
        return $this->render('plan_travail/index.html.twig', [
            'plan_travails' => $planTravailRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="plan_travail_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $planTravail = new PlanTravail();
        $form = $this->createForm(PlanTravailType::class, $planTravail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($planTravail);
            $entityManager->flush();

            return $this->redirectToRoute('plan_travail_index');
        }

        return $this->render('plan_travail/new.html.twig', [
            'plan_travail' => $planTravail,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="plan_travail_show", methods={"GET"})
     */
    public function show(PlanTravail $planTravail): Response
    {
        return $this->render('plan_travail/show.html.twig', [
            'plan_travail' => $planTravail,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="plan_travail_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PlanTravail $planTravail): Response
    {
        $form = $this->createForm(PlanTravailType::class, $planTravail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('plan_travail_index');
        }

        return $this->render('plan_travail/edit.html.twig', [
            'plan_travail' => $planTravail,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="plan_travail_delete", methods={"POST"})
     */
    public function delete(Request $request, PlanTravail $planTravail): Response
    {
        if ($this->isCsrfTokenValid('delete'.$planTravail->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($planTravail);
            $entityManager->flush();
        }

        return $this->redirectToRoute('plan_travail_index');
    }

    /* encaaaaaaaadraaant*/
    /**
     * @Route("/encadrant", name="plan_travail_index_encadrant", methods={"GET"})
     */
    public function indexencadrant(PlanTravailRepository $planTravailRepository): Response
    {
        return $this->render('plan_travail/index_encadrant.html.twig', [
            'plan_travails' => $planTravailRepository->findAll(),
        ]);
    }

    /**
     * @Route("/encadrant_validee/{id}", name="valider_plan", methods={"GET"})
     */

    public function changerEtatAction($id,PlanTravailRepository $repository)
    {
        $em = $this->getDoctrine()->getManager();
        $plan=$repository->find($id);
        $plans=$repository->findAll();
        $plan->setValidation("valide");
        $em->persist($plan);
        $em->flush();
        $this->redirectToRoute('plan_travail_index_encadrant');
        return $this->render('plan_travail/index_encadrant.html.twig',[
            'plan_travails'=>$plans
        ]);

    }

    /**
     * @Route("/encadrant_refuse/{id}", name="refuser_plan", methods={"GET"})
     */

    public function changerEtatAction2($id,PlanTravailRepository $repository)
    {
        $em = $this->getDoctrine()->getManager();
        $plan=$repository->find($id);
        $plans=$repository->findAll();
        $plan->setValidation("refuse");
        $em->persist($plan);
        $em->flush();
        $this->redirectToRoute('plan_travail_index_encadrant');
        return $this->render('plan_travail/index_encadrant.html.twig',[
            'plan_travails'=>$plans
        ]);

    }
}

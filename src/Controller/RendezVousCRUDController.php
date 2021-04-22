<?php

namespace App\Controller;

use App\Entity\PropertySearch;
use App\Entity\RendezVous;
use App\Form\PropertySearchType;
use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use Cassandra\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\{TextType,ButtonType,EmailType,HiddenType,PasswordType,TextareaType,SubmitType,NumberType,DateType,MoneyType,BirthdayType};

/**
 * @Route("/rendez/vous/c/r/u/d")
 */
class RendezVousCRUDController extends AbstractController
{
    /**
     * @Route("/", name="rendez_vous_c_r_u_d_index", methods={"GET","Post"})
     */
    public function index(Request $request)
    {
        $propertySearch = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class,$propertySearch);
        $form->handleRequest($request);

        $rendezVou= [];

        if($form->isSubmitted() && $form->isValid()) {
            $userName = $propertySearch->getUserName();
            if ($userName!="")
                $rendezVou= $this->getDoctrine()->getRepository(RendezVous::class)->findBy(['userName' => $userName] );
            else
                $rendezVou= $this->getDoctrine()->getRepository(RendezVous::class)->findAll();
        }
        return $this->render('rendez_vous_crud/index.html.twig', [ 'form' =>$form->createView(),
            'rendez_vouses' => $rendezVou]);
    }

    /**
     * @Route("/new", name="rendez_vous_c_r_u_d_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rendezVou = new RendezVous();
        $form = $this->createFormBuilder($rendezVou)
        ->add('user_name', TextType::class)
        ->add('lieu', TextType::class)
        ->add('date', DateType::class)
        ->add('raison', TextType::class)
        ->add('save', SubmitType::class, array('label' => 'Ajouter'))->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rendezVou = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rendezVou);
            $entityManager->flush();

            return $this->redirectToRoute('rendez_vous_c_r_u_d_index');
        }

        return $this->render('rendez_vous_crud/new.html.twig', [
            'rendez_vou' => $rendezVou,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rendez_vous_c_r_u_d_show", methods={"GET"})
     */
    public function show(RendezVous $rendezVou): Response

    {
        $rendezVou = $this->getDoctrine()->getRepository(RendezVous::class)->find($rendezVou);
        return $this->render('rendez_vous_crud/show.html.twig', [
            'rendez_vou' => $rendezVou,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rendez_vous_c_r_u_d_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RendezVous $id): Response
    {
        $rendezVou = new RendezVous();
        $rendezVou = $this->getDoctrine()->getRepository(RendezVous::class)->find($id);
        $form = $this->createFormBuilder($rendezVou)
            ->add('user_name', TextType::class)
            ->add('lieu', TextType::class)
            ->add('date', DateType::class)
            ->add('raison', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Modifier'))->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rendez_vous_c_r_u_d_index');
        }

        return $this->render('rendez_vous_crud/edit.html.twig', [
            'rendez_vou' => $rendezVou,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rendez_vous_c_r_u_d_delete", methods={"POST"})
     */
    public function delete(Request $request, RendezVous $rendezVous) : Response
    {

        if ($this->isCsrfTokenValid('delete'.$rendezVous->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rendezVous);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rendez_vous_c_r_u_d_index');
    }



}

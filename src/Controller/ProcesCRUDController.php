<?php

namespace App\Controller;

use App\Entity\ProcesVerbal;
use App\Entity\User;
use App\Form\ProcesVerbalType;
use App\Repository\ProcesVerbalRepository;
use Doctrine\ORM\Id\BigIntegerIdentityGenerator;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{ChoiceType, IntegerType, TextType, ButtonType, EmailType, HiddenType, PasswordType, TextareaType, SubmitType, NumberType, DateType, MoneyType, BirthdayType};
use Symfony\Component\Form\FormTypeInterface;

/**
 * @Route("/proces/c/r/u/d")
 */
class ProcesCRUDController extends AbstractController
{
    /**
     * @Route("/", name="proces_c_r_u_d_index", methods={"GET"})
     */
    public function index(ProcesVerbalRepository $procesVerbalRepository): Response
    {
        return $this->render('proces_crud/index.html.twig', [
            'proces_verbals' => $procesVerbalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="proces_c_r_u_d_new", methods={"GET","POST"})
     */
    public function new(Request $request ): Response
    {
        $procesVerbal = new ProcesVerbal();
        $form = $this->createForm(ProcesVerbalType::class,$procesVerbal);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($procesVerbal);
            $entityManager->flush();

            return $this->redirectToRoute('proces_c_r_u_d_index');
        }

        return $this->render('proces_crud/new.html.twig', [
            'proces_verbal' => $procesVerbal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proces_c_r_u_d_show", methods={"GET"})
     */
    public function show(ProcesVerbal $procesVerbal): Response
    {  $procesVerbal = $this->getDoctrine()->getRepository(ProcesVerbal::class)->find($procesVerbal);
        return $this->render('proces_crud/show.html.twig', [
            'proces_verbal' => $procesVerbal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="proces_c_r_u_d_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProcesVerbal $id): Response
    {
        $procesVerbal = new ProcesVerbal();
        $procesVerbal = $this->getDoctrine()->getRepository(ProcesVerbal::class)->find($id);
        $form = $this->createFormBuilder($procesVerbal)
            ->add('date', DateType::class)
            ->add('membre_reunion', TextType::class)
            ->add('description', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Modifier'))->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proces_c_r_u_d_index');
        }

        return $this->render('proces_crud/edit.html.twig', [
            'proces_verbal' => $procesVerbal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proces_c_r_u_d_delete", methods={"POST"})
     */
    public function delete(Request $request, ProcesVerbal $procesVerbal): Response
    {
        if ($this->isCsrfTokenValid('delete'.$procesVerbal->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($procesVerbal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('proces_c_r_u_d_index');
    }
}

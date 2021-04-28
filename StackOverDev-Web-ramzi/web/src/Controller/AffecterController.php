<?php

namespace App\Controller;

use App\Entity\Affecter;
use App\Form\AffecterType;
use App\Repository\AffecterRepository;
use phpDocumentor\Reflection\Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AffecterController extends AbstractController
{

    /**
     * @Route("/affcter", name="affecter")
     */
    public function index(): Response
    {
        return $this->render('affecter/index.html.twig', [
            'controller_name' => 'AffecterController',
        ]);
    }

    /**
     * @param AffecterRepository $repository
     * @return Response
     * @Route ("/afficheaffectation",name="afficheaffectation")
     */
    public function  AfficheAffectation(AffecterRepository $repository){
        // $repo=$this->getDoctrine()->getRepository(User::class);
        $affecter=$repository->findAll();
        return $this->render('affecter/AfficheAffectation.html.twig',
            ['affecter'=>$affecter]);

    }

    /**
     * @Route ("/supp/{id}",name="supprimer")
     */
    function supprimer($id,AffecterRepository $repository){

        $affecter=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($affecter);
        $em->flush();
        return $this->redirectToRoute("afficheaffectation");
    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/affecter",name="affecter")
     */
    function affecter(Request $request){
        $affecter=new Affecter();
        $form=$this->createForm(AffecterType::class,$affecter);
        $form->add('Affecter', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $en=$this->getDoctrine()->getManager();

            $en->persist($affecter);
            $en->flush();
            return $this->redirectToRoute( 'afficheaffectation');

        }
        return $this->render('affecter/affecter.html.twig',
            ['form'=>$form->createview()]
        );

    }


    /**
     * @Route  ("/modifierAffectation/{id}",name="modifierAffectation")
     */
    function  update($id,AffecterRepository $repository,Request $request){
        $affecter=$repository->find($id);
        $form=$this->createForm( AffecterType::class,$affecter);
        $form->add('modifier', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $en=$this->getDoctrine()->getManager();
            $en->flush();
            return $this->redirectToRoute( 'afficheaffectation');
        }

        return $this->render('affecter/modifier.html.twig',
            ['form'=>$form->createview()]
        );

    }




}

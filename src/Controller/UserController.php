<?php

namespace App\Controller;

use App\Entity\User;
use App\Controller\AffecterController;
use App\Controller\AccueilController;
use App\Controller\AccueilEncadrantController;
use App\Controller\AccueilResponsableController;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="user")
     */
    public function index(): Response
    {
        return $this->render('security/login.html.twig', [
            'controller_name' => 'UserController',
        ]);

    }

    /**
     * @param UserRepository $repository
     * @return Response
     * @Route ("/afficheuser",name="afficheuser")
     */
    public function  AfficheUser(UserRepository $repository){
        // $repo=$this->getDoctrine()->getRepository(User::class);
        $user=$repository->findAll();
        return $this->render('user/AfficheUser.html.twig',
            ['user'=>$user]);

    }

    /**
     * @Route ("/supp/{id}",name="supprimer")
     */
    function supprimer($id,UserRepository $repository){

        $user=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute("afficheuser");
    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/ajouter",name="ajouter")
     */
    function ajouter(Request  $request, \Swift_Mailer $mailer){
        $user=new User();
        $form=$this->createForm( UserType::class,$user);
        $form->add('Ajouter', SubmitType::class);

        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $en=$this->getDoctrine()->getManager();

            $en->persist($user);
            $en->flush();

            $message=(new \Swift_Message('Information'))
                ->setFrom("azeaz@azeaz.com")
                ->setTo($user->getEmail())
                ->setBody("votre compte a été cree: ".$user->getEmail().$user->getEmail()."",
                    'text/html'
                );
            $mailer->send($message);


            return $this->redirectToRoute( 'afficheuser');

        }
        return $this->render('user/ajouter.html.twig',
            ['form'=>$form->createview()]
        );

    }


    /**
     * @Route  ("/modifier/{id}",name="modifier")
     */
    function  update($id,UserRepository $repository,Request $request){
        $user=$repository->find($id);
        $form=$this->createForm( UserType::class,$user);
        $form->add('modifier', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $en=$this->getDoctrine()->getManager();
            $en->flush();
            return $this->redirectToRoute( 'afficheuser');
        }

        return $this->render('user/modifier.html.twig',
            ['form'=>$form->createview()]
        );


    }


    /**
     *@Route ("/rechercheajax",name="rechercheajax")
     */
    public function rechercheAjax (Request $request , UserRepository $repository)
    {
        $repository=$this->getDoctrine()->getRepository(User::class);
        $requestString=$request->get('searchValue');
        $user=$repository->rechercheUser($requestString);
        return $this->render('user/userAjax.html.twig',
            ['user'=>$user]

        );

    }

    /**
     * @Route("/connecter", name="connecter", methods={"GET","POST"})
     */
    public  function  connecter(UserRepository $repository,Request $request)
    {

        $email = $request->get('email');
        $pass = $request->get('pass');



        $verifexite = $this->getDoctrine()->getRepository(User::class)->findOneBy([
            'email' => $email, 'password' => $pass
        ]);

        if (is_null($verifexite)) {

            return $this->redirectToRoute("user");

        }

        elseif ($verifexite->getRole() == "Etudiant") {

            return $this->redirectToRoute("accueil");
        }

        elseif ($verifexite->getRole() == "responsable des stages") {

            return $this->redirectToRoute("accueil_responsable");
        }
        elseif ($verifexite->getRole() == "Encadrant Académique ") {

            return $this->redirectToRoute("accueil_encadrant");
        }

        else  {

            return $this->redirectToRoute("ajouter");
        }
    }



}

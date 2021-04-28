<?php

namespace App\Controller;

use App\Entity\Bilan;
use App\Entity\Reponses;
use App\Form\ReponsesType;
use App\Repository\QuestionsRepository;
use App\Repository\ReponsesRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DebutstageController extends AbstractController
{
    /**
     * @Route("/debutstage", name="debutstage")
     */
    public function index(UserRepository $userRepository): Response
    {
        $userRepo = $userRepository->countStartDeadlineUser(3);
        $numberjrs = $userRepo[0][1];
        return $this->render('debutstage/index.html.twig',[
            'date' => (int)$numberjrs
        ]);
    }

    /**
     * @Route("/afficherdebut", name="afficher_debut")
     */
    public function show(): Response
    {
        $repository= $this->getDoctrine()->getRepository(Bilan::class);
        $bilans=$repository->findAll();

        return $this->render('debutstage/showquestions.html.twig',["bilans"=>$bilans]);
    }
    /**
     * @Route("/bilandebut", name="bilan_debut", methods={"GET","POST"})
     */
    public function new(Request $request,
                        QuestionsRepository $questionsRepository, UserRepository $userRepository,
                        EntityManagerInterface $em
    ) : Response {
        $userRepo = $userRepository->find(3);
        if ($request->isMethod('POST')) {
            foreach($request->request as $idQuestion=>$responseUser){
                $question = $questionsRepository->findOneBy(["id"=>$idQuestion]);
                $response[$idQuestion] = new Reponses();
                $response[$idQuestion]->setRep($responseUser);
                $response[$idQuestion]->setIndexPeriode($question->getIndexPeriode());
                $response[$idQuestion]->setQuestionDesReponses($question);
                $response[$idQuestion]->setRepsEtud($userRepo);
                $em->persist($response[$idQuestion]);
            }
            $em->flush();
            return $this->redirectToRoute('debutstage');
        }
        return $this->render('debutstage/answerquestions.html.twig', [
            'questions' => $questionsRepository->findAll(),]);
    }

    /**
     * @Route("/modifierdebut", name="modifier_debut", methods={"GET","POST"})
     */
    public function edit(Request $request,
                         QuestionsRepository $questionsRepository,
                         ReponsesRepository $reponsesRepository,
                         EntityManagerInterface $em) : Response {
        dump($request);
        if ($request->isMethod('POST')) {
            foreach ($request->request as $idReponse => $reponseText) {
                $reponse= $reponsesRepository->find($idReponse);
                $reponse->setRep($reponseText);
                $em->flush();

            }

            return $this->redirectToRoute('debutstage');

        }
        return $this->render('debutstage/updateanswers.html.twig', [
            'questions' => $questionsRepository->findAll(),'reponses' =>$reponsesRepository->findAll()
        ]);
    }
}

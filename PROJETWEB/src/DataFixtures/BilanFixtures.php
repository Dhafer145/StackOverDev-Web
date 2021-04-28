<?php

namespace App\DataFixtures;

use App\Entity\Bilan;
use App\Entity\Questions;
use App\Entity\Reponses;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BilanFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Les questions


        $Q02=new Questions();
        $Q02->setIndexPeriode(0)->setQuest("Évaluez votre capacité à travailler en équipe ?");
        $manager->persist($Q02);

        $Q03=new Questions();
        $Q03->setIndexPeriode(0)->setQuest("Évaluez votre capacité à être autonome ?");
        $manager->persist($Q03);

        $Q04=new Questions();
        $Q04->setIndexPeriode(0)->setQuest("Évaluez votre capacité à être résilient ?");
        $manager->persist($Q04);

        $Q05=new Questions();
        $Q05->setIndexPeriode(0)->setQuest("Évaluez votre capacité à organiser votre travail dans les délais ?");
        $manager->persist($Q05);

        $Q06=new Questions();
        $Q06->setIndexPeriode(0)->setQuest("Évaluez-vous votre capacité à prendre des initiatives ?");
        $manager->persist($Q06);

        $Q07=new Questions();
        $Q07->setIndexPeriode(0)->setQuest("Évaluez-vous votre capacité à réaliser un travail de qualité ?");
        $manager->persist($Q07);
        // 111111111111111111111111111111111111111111111111111111111111111111111111111111

        $Q11=new Questions();
        $Q11->setIndexPeriode(1)->setQuest("Qu’est-ce qui vous plaît et vous motive dans votre stage?");
        $manager->persist($Q11);

        $Q12=new Questions();
        $Q12->setIndexPeriode(1)->setQuest("Décrivez une situation de travail marquante que vous avez vécu.");
        $manager->persist($Q12);

        $Q12=new Questions();
        $Q12->setIndexPeriode(1)->setQuest("Avez-vous vécu pendant votre stage une situation difficile ou problématique?");
        $manager->persist($Q12);

        $Q13=new Questions();
        $Q13->setIndexPeriode(1)->setQuest("Que retirez-vous comme apprentissages depuis le début de votre stage ?");
        $manager->persist($Q13);

        $Q14=new Questions();
        $Q14->setIndexPeriode(1)->setQuest("Comment gérez-vous les délais dans votre travail?");
        $manager->persist($Q14);

        $Q15=new Questions();
        $Q15->setIndexPeriode(1)->setQuest("De quelle(s) manière(s) utilisez-vous vos capacités dans votre stage? ");
        $manager->persist($Q15);

        //22222222222222222222222222222222222222222222222222222222222222222222222222222222
        $Q21=new Questions();
        $Q21->setIndexPeriode(2)->setQuest("Vos missions ont-elles évolué depuis le début de votre stage?");
        $manager->persist($Q21);

        $Q22=new Questions();
        $Q22->setIndexPeriode(2)->setQuest("Citez une réalisation dont vous êtes fier/ère :");
        $manager->persist($Q22);

        $Q23=new Questions();
        $Q23->setIndexPeriode(2)->setQuest("Comment avez-vous procédé pour mener à bien cette mission?");
        $manager->persist($Q23);

        $Q24=new Questions();
        $Q24->setIndexPeriode(2)->setQuest("Quels ont été vos défis pendant votre stage?");
        $manager->persist($Q24);

        $Q25=new Questions();
        $Q25->setIndexPeriode(2)->setQuest("Comment avez-vous réussi à surmonter vos reculs?");
        $manager->persist($Q25);

        $Q26=new Questions();
        $Q26->setIndexPeriode(2)->setQuest("Comment votre stage confirme-t-il votre projet professionnel ?");
        $manager->persist($Q26);
//3333333333333333333333333333333333333333333333333333333333333333333333333333333333
        $Q31=new Questions();
        $Q31->setIndexPeriode(3)->setQuest("De manière générale, comment vos missions ont-elles evolué?");
        $manager->persist($Q31);

        $Q32=new Questions();
        $Q32->setIndexPeriode(3)->setQuest("Quelles ont été vos meilleures réalisations pendant votre stage?");
        $manager->persist($Q32);

        $Q33=new Questions();
        $Q33->setIndexPeriode(3)->setQuest("Quels apprentissages pouvez-vous en tirer ? ");
        $manager->persist($Q33);

        $Q34=new Questions();
        $Q34->setIndexPeriode(3)->setQuest("Quelles compétences avez-vous développé pour mener à bien vos missions? ");
        $manager->persist($Q34);

        $Q35=new Questions();
        $Q35->setIndexPeriode(3)->setQuest("Quel bilan faites-vous de votre projet professionnel à la fin de votre stage ?");
        $manager->persist($Q35);
        //fin questions

        $B1=new Bilan();
        $B1->setIndexPeriode(1)->setTitreDescriptif("Debut de Stage")
            ->addQuestionsBilan($Q11)->addQuestionsBilan($Q12)->addQuestionsBilan($Q13)->addQuestionsBilan($Q14)->addQuestionsBilan($Q15)
            ->addQuestionsBilan($Q02)->addQuestionsBilan($Q03)->addQuestionsBilan($Q04)->addQuestionsBilan($Q05)
            ->addQuestionsBilan($Q06)->addQuestionsBilan($Q07);
        $manager->persist($B1);

        $B2=new Bilan();
        $B2->setIndexPeriode(2)->setTitreDescriptif("Milieu de Stage")
            ->addQuestionsBilan($Q21)->addQuestionsBilan($Q22)->addQuestionsBilan($Q23)->addQuestionsBilan($Q24)->addQuestionsBilan($Q25)
            ->addQuestionsBilan($Q26)->addQuestionsBilan($Q02)->addQuestionsBilan($Q03)->addQuestionsBilan($Q04)->addQuestionsBilan($Q05)
            ->addQuestionsBilan($Q06)->addQuestionsBilan($Q07);
        $manager->persist($B2);
        $B3=new Bilan();
        $B3->setIndexPeriode(3)->setTitreDescriptif("Fin de Stage")
            ->addQuestionsBilan($Q31)->addQuestionsBilan($Q32)->addQuestionsBilan($Q33)->addQuestionsBilan($Q34)->addQuestionsBilan($Q35)
            ->addQuestionsBilan($Q02)->addQuestionsBilan($Q03)->addQuestionsBilan($Q04)->addQuestionsBilan($Q05)
            ->addQuestionsBilan($Q06)->addQuestionsBilan($Q07);
        $manager->persist($B3);
        // $product = new Product();
        // $manager->persist($product);

        ////Reppooonnnses


        $manager->flush();
    }



}

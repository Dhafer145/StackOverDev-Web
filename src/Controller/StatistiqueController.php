<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;

class StatistiqueController extends AbstractController
{
    /**
     * @Route("/statuser", name="statuser")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $ListUser = $repository->findAll();
        $em = $this->getDoctrine()->getManager();

        $etudiants = 0;
        $encadrantAc = 0;
        $encadrantPro =0;
        $responsable =0;



        foreach ($ListUser as $User) {
            if ($User->getRole() == "Etudiant")

                $etudiants += 1;
            elseif($User->getRole() == "Encadrant Académique")
                $encadrantAc+= 1;
            elseif($User->getRole() == "Encadrant Entreprise")
                $encadrantPro += 1;

            else
                $responsable +=1;
        }


        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [['State', 'nombres'],
                ['Etudiants', $etudiants],
                ['Encadrants Académiques', $encadrantAc],
                ['Encadrants Entreprise', $encadrantPro],
                ['Responsable des stages', $responsable]

            ]
        );
        //$pieChart->getOptions()->setTitle('Events Statistic');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);

        return $this->render('statistique/index.html.twig', array('piechart' => $pieChart));
    }
}

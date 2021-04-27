<?php
namespace App\Controller;

use App\Entity\Questions;
use App\Entity\Reponses;
use App\Repository\ReponsesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;

class statistiqueController extends AbstractController{
    /**
     * @Route("/statistique", name="bilan_stats")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository(Questions::class);
        $ListeQuestions = $repository->findAll();
        $em = $this->getDoctrine()->getManager();

        $DebutStage = 0;
        $MilieuStage = 0;
        $FinStage =0;
        $Evaluation=0;

        foreach ($ListeQuestions as $listquestions) {
            if ( $listquestions->getIndexPeriode()==1)
                $DebutStage += 1;
            elseif( $listquestions->getIndexPeriode()==2)
                $MilieuStage += 1;
            elseif( $listquestions->getIndexPeriode()==3)
                $FinStage += 1;
            else{
                $Evaluation+=1;
            }

        }


        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [['State', 'nombres'],
                ['Debut de Stage', $DebutStage],
                ['Milieu de Stage', $MilieuStage],
                ['Fin de Stage', $FinStage],
                ['Evaluation', $Evaluation]
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

        return $this->render('gestionbilan/statistiques.html.twig', array('piechart' => $pieChart));
    }

}

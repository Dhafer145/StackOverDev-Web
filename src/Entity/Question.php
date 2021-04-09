<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity
 */
class Question
{
    /**
     * @var int
     *
     * @ORM\Column(name="idQuestion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idquestion;

    /**
     * @var string
     *
     * @ORM\Column(name="quest", type="string", length=255, nullable=false)
     */
    private $quest;

    /**
     * @var int
     *
     * @ORM\Column(name="indexPeriode", type="integer", nullable=false)
     */
    private $indexperiode;


}

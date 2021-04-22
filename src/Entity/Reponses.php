<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponses
 *
 * @ORM\Table(name="reponses", indexes={@ORM\Index(name="IDX_1E512EC6740D47C0", columns={"reps_etud_id"}), @ORM\Index(name="IDX_1E512EC6BAF8D5D3", columns={"rep_de_quest_id"})})
 * @ORM\Entity
 */
class Reponses
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="rep", type="string", length=255, nullable=false)
     */
    private $rep;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reps_etud_id", referencedColumnName="id")
     * })
     */
    private $repsEtud;

    /**
     * @var \Questions
     *
     * @ORM\ManyToOne(targetEntity="Questions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rep_de_quest_id", referencedColumnName="id")
     * })
     */
    private $repDeQuest;


}

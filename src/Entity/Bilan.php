<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bilan
 *
 * @ORM\Table(name="bilan")
 * @ORM\Entity
 */
class Bilan
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
     * @ORM\Column(name="titre_descriptif", type="string", length=255, nullable=false)
     */
    private $titreDescriptif;

    /**
     * @var int
     *
     * @ORM\Column(name="index_periode", type="integer", nullable=false)
     */
    private $indexPeriode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Questions", inversedBy="bilan")
     * @ORM\JoinTable(name="bilan_questions",
     *   joinColumns={
     *     @ORM\JoinColumn(name="bilan_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="questions_id", referencedColumnName="id")
     *   }
     * )
     */
    private $questions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

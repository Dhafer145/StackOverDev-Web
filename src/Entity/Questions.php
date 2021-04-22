<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity
 */
class Questions
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
     * @ORM\Column(name="quest", type="string", length=255, nullable=false)
     */
    private $quest;

    /**
     * @var int
     *
     * @ORM\Column(name="index_periode", type="integer", nullable=false)
     */
    private $indexPeriode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Bilan", mappedBy="questions")
     */
    private $bilan;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bilan = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JournalProjet
 *
 * @ORM\Table(name="journal_projet", indexes={@ORM\Index(name="IDX_8B4D8E4CEA9BF318", columns={"etudiantjp_id"})})
 * @ORM\Entity
 */
class JournalProjet
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="tache", type="string", length=255, nullable=false)
     */
    private $tache;

    /**
     * @var string
     *
     * @ORM\Column(name="avis", type="string", length=255, nullable=false)
     */
    private $avis;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etudiantjp_id", referencedColumnName="id")
     * })
     */
    private $etudiantjp;


}

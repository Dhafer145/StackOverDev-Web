<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presentation
 *
 * @ORM\Table(name="presentation")
 * @ORM\Entity
 */
class Presentation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_p", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idP;

    /**
     * @var string
     *
     * @ORM\Column(name="non_etudiant", type="string", length=20, nullable=false)
     */
    private $nonEtudiant;

    /**
     * @var string
     *
     * @ORM\Column(name="non_president", type="string", length=20, nullable=false)
     */
    private $nonPresident;

    /**
     * @var string
     *
     * @ORM\Column(name="non_encadrant", type="string", length=20, nullable=false)
     */
    private $nonEncadrant;

    /**
     * @var string
     *
     * @ORM\Column(name="date_soutenance", type="string", length=20, nullable=false)
     */
    private $dateSoutenance;

    /**
     * @var string
     *
     * @ORM\Column(name="salle", type="string", length=20, nullable=false)
     */
    private $salle;


}

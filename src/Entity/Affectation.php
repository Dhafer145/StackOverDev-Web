<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectation
 *
 * @ORM\Table(name="affectation")
 * @ORM\Entity
 */
class Affectation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_affectation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAffectation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_etudiant", type="string", length=40, nullable=false)
     */
    private $nomEtudiant;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_encadrant_academique", type="string", length=40, nullable=false)
     */
    private $nomEncadrantAcademique;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_encadrant_entreprise", type="string", length=40, nullable=false)
     */
    private $nomEncadrantEntreprise;

    /**
     * @var int
     *
     * @ORM\Column(name="id_etudiant", type="integer", nullable=false)
     */
    private $idEtudiant;

    /**
     * @var int
     *
     * @ORM\Column(name="id_encadrant_academique", type="integer", nullable=false)
     */
    private $idEncadrantAcademique;

    /**
     * @var int
     *
     * @ORM\Column(name="id_encadrant_entreprise", type="integer", nullable=false)
     */
    private $idEncadrantEntreprise;


}

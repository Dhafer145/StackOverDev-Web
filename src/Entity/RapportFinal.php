<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RapportFinal
 *
 * @ORM\Table(name="rapport_final")
 * @ORM\Entity
 */
class RapportFinal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_rf", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRf;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_encadrant", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idEncadrant = NULL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_etudiant", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idEtudiant = NULL;

    /**
     * @var float
     *
     * @ORM\Column(name="plagiat", type="float", precision=10, scale=0, nullable=false)
     */
    private $plagiat;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="text", length=16777215, nullable=false)
     */
    private $fichier;


}

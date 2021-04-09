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
     * @ORM\Column(name="idBilan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbilan;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="indexPeriode", type="integer", nullable=false)
     */
    private $indexperiode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="periode", type="date", nullable=false)
     */
    private $periode;


}

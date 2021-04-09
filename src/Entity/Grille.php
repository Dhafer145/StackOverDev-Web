<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grille
 *
 * @ORM\Table(name="grille")
 * @ORM\Entity
 */
class Grille
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
     * @var int
     *
     * @ORM\Column(name="id_enc", type="integer", nullable=false)
     */
    private $idEnc;

    /**
     * @var int
     *
     * @ORM\Column(name="id_etu", type="integer", nullable=false)
     */
    private $idEtu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_r", type="date", nullable=false, options={"default"="current_timestamp()"})
     */
    private $dateR = 'current_timestamp()';

    /**
     * @var string
     *
     * @ORM\Column(name="mention", type="string", length=1, nullable=false)
     */
    private $mention;

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float", precision=10, scale=0, nullable=false)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="q1", type="string", length=1, nullable=false)
     */
    private $q1;

    /**
     * @var string
     *
     * @ORM\Column(name="q2", type="string", length=1, nullable=false)
     */
    private $q2;

    /**
     * @var string
     *
     * @ORM\Column(name="q3", type="string", length=1, nullable=false)
     */
    private $q3;

    /**
     * @var string
     *
     * @ORM\Column(name="q4", type="string", length=1, nullable=false)
     */
    private $q4;

    /**
     * @var string
     *
     * @ORM\Column(name="q5", type="string", length=1, nullable=false)
     */
    private $q5;

    /**
     * @var string
     *
     * @ORM\Column(name="q6", type="string", length=1, nullable=false)
     */
    private $q6;

    /**
     * @var string
     *
     * @ORM\Column(name="q7", type="string", length=1, nullable=false)
     */
    private $q7;

    /**
     * @var string
     *
     * @ORM\Column(name="q8", type="string", length=1, nullable=false)
     */
    private $q8;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation")
 * @ORM\Entity
 */
class Evaluation
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
     * @var int|null
     *
     * @ORM\Column(name="id_enc", type="integer", nullable=true, options={"default"="1"})
     */
    private $idEnc = 1;

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
     * @var bool
     *
     * @ORM\Column(name="ponctualite", type="boolean", nullable=false)
     */
    private $ponctualite;

    /**
     * @var string
     *
     * @ORM\Column(name="comm1", type="text", length=65535, nullable=false)
     */
    private $comm1;

    /**
     * @var bool
     *
     * @ORM\Column(name="integration", type="boolean", nullable=false)
     */
    private $integration;

    /**
     * @var string
     *
     * @ORM\Column(name="comm2", type="text", length=65535, nullable=false)
     */
    private $comm2;

    /**
     * @var bool
     *
     * @ORM\Column(name="travail", type="boolean", nullable=false)
     */
    private $travail;

    /**
     * @var string
     *
     * @ORM\Column(name="comm3", type="text", length=65535, nullable=false)
     */
    private $comm3;

    /**
     * @var bool
     *
     * @ORM\Column(name="competence", type="boolean", nullable=false)
     */
    private $competence;

    /**
     * @var string
     *
     * @ORM\Column(name="comm4", type="text", length=65535, nullable=false)
     */
    private $comm4;

    /**
     * @var bool
     *
     * @ORM\Column(name="eg", type="boolean", nullable=false)
     */
    private $eg;

    /**
     * @var string
     *
     * @ORM\Column(name="comm5", type="text", length=65535, nullable=false)
     */
    private $comm5;


}

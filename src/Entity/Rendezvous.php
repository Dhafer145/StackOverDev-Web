<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rendezvous
 *
 * @ORM\Table(name="rendezvous")
 * @ORM\Entity
 */
class Rendezvous
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_rv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRv;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=200, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=20, nullable=false)
     */
    private $lieu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $date = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="raison", type="string", length=100, nullable=false)
     */
    private $raison;


}

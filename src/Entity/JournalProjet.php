<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JournalProjet
 *
 * @ORM\Table(name="journal_projet")
 * @ORM\Entity
 */
class JournalProjet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_jp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJp;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idUser = NULL;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=20, nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="tache", type="string", length=200, nullable=false)
     */
    private $tache;

    /**
     * @var string
     *
     * @ORM\Column(name="avis", type="string", length=200, nullable=false)
     */
    private $avis;


}

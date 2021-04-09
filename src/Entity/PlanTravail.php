<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanTravail
 *
 * @ORM\Table(name="plan_travail")
 * @ORM\Entity
 */
class PlanTravail
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pt", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idUser = NULL;

    /**
     * @var string
     *
     * @ORM\Column(name="backlog", type="string", length=1000, nullable=false)
     */
    private $backlog;

    /**
     * @var string
     *
     * @ORM\Column(name="sprints", type="string", length=1000, nullable=false)
     */
    private $sprints;

    /**
     * @var string|null
     *
     * @ORM\Column(name="validation_pt", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $validationPt = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaire_pt", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $commentairePt = 'NULL';


}

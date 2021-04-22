<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanTravail
 *
 * @ORM\Table(name="plan_travail", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_2E3632B3C0CB7C3B", columns={"etudiantpp_id"})})
 * @ORM\Entity
 */
class PlanTravail
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
     * @var string
     *
     * @ORM\Column(name="backlog", type="string", length=255, nullable=false)
     */
    private $backlog;

    /**
     * @var string
     *
     * @ORM\Column(name="sprints", type="text", length=0, nullable=false)
     */
    private $sprints;

    /**
     * @var string
     *
     * @ORM\Column(name="validation", type="string", length=255, nullable=false)
     */
    private $validation;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, nullable=false)
     */
    private $commentaire;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etudiantpp_id", referencedColumnName="id")
     * })
     */
    private $etudiantpp;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PropositionProjet
 *
 * @ORM\Table(name="proposition_projet", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_D6781ECFC0CB7C3B", columns={"etudiantpp_id"})})
 * @ORM\Entity
 */
class PropositionProjet
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
     * @ORM\Column(name="nom_sujet", type="string", length=255, nullable=false)
     */
    private $nomSujet;

    /**
     * @var string
     *
     * @ORM\Column(name="cahier_charge", type="string", length=255, nullable=false)
     */
    private $cahierCharge;

    /**
     * @var string
     *
     * @ORM\Column(name="validationproposition", type="string", length=255, nullable=false)
     */
    private $validationproposition;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaireprop", type="string", length=255, nullable=false)
     */
    private $commentaireprop;

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

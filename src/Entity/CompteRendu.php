<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompteRendu
 *
 * @ORM\Table(name="compte_rendu", indexes={@ORM\Index(name="IDX_D39E69D24D8259E2", columns={"etudiantcr_id"})})
 * @ORM\Entity
 */
class CompteRendu
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
     * @ORM\Column(name="fichier", type="string", length=255, nullable=false)
     */
    private $fichier;

    /**
     * @var string
     *
     * @ORM\Column(name="validationcr", type="string", length=255, nullable=false)
     */
    private $validationcr;

    /**
     * @var string
     *
     * @ORM\Column(name="commentairetud", type="string", length=255, nullable=false)
     */
    private $commentairetud;

    /**
     * @var string
     *
     * @ORM\Column(name="commentairencad", type="string", length=300, nullable=false)
     */
    private $commentairencad;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etudiantcr_id", referencedColumnName="id")
     * })
     */
    private $etudiantcr;


}

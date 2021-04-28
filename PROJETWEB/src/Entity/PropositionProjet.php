<?php

namespace App\Entity;

use App\Repository\PropositionProjetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PropositionProjetRepository::class)
 */
class PropositionProjet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_sujet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cahier_charge;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $validationproposition;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaireprop;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="ppetudiant", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiantpp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSujet(): ?string
    {
        return $this->nom_sujet;
    }

    public function setNomSujet(string $nom_sujet): self
    {
        $this->nom_sujet = $nom_sujet;

        return $this;
    }

    public function getCahierCharge(): ?string
    {
        return $this->cahier_charge;
    }

    public function setCahierCharge(string $cahier_charge): self
    {
        $this->cahier_charge = $cahier_charge;

        return $this;
    }

    public function getValidationproposition(): ?string
    {
        return $this->validationproposition;
    }

    public function setValidationproposition(string $validationproposition): self
    {
        $this->validationproposition = $validationproposition;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCommentaireprop(): ?string
    {
        return $this->commentaireprop;
    }

    public function setCommentaireprop(string $commentaireprop): self
    {
        $this->commentaireprop = $commentaireprop;

        return $this;
    }

    public function getEtudiantpp(): ?User
    {
        return $this->etudiantpp;
    }

    public function setEtudiantpp(User $etudiantpp): self
    {
        $this->etudiantpp = $etudiantpp;

        return $this;
    }
}

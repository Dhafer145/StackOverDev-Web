<?php

namespace App\Entity;

use App\Repository\AffectationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AffectationRepository::class)
 */
class Affectation
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
    private $nom_etudiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_encadrant_academique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_encadrant_entreprise;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="etudiant_affectation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="encadrant_academique_affecation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_encadrant_academique;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="encadrant_entreprise_affectation")
     */
    private $id_encadrant_entreprise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->nom_etudiant;
    }

    public function setNomEtudiant(string $nom_etudiant): self
    {
        $this->nom_etudiant = $nom_etudiant;

        return $this;
    }

    public function getNomEncadrantAcademique(): ?string
    {
        return $this->nom_encadrant_academique;
    }

    public function setNomEncadrantAcademique(string $nom_encadrant_academique): self
    {
        $this->nom_encadrant_academique = $nom_encadrant_academique;

        return $this;
    }

    public function getNomEncadrantEntreprise(): ?string
    {
        return $this->nom_encadrant_entreprise;
    }

    public function setNomEncadrantEntreprise(string $nom_encadrant_entreprise): self
    {
        $this->nom_encadrant_entreprise = $nom_encadrant_entreprise;

        return $this;
    }

    public function getIdEtudiant(): ?User
    {
        return $this->id_etudiant;
    }

    public function setIdEtudiant(User $id_etudiant): self
    {
        $this->id_etudiant = $id_etudiant;

        return $this;
    }

    public function getIdEncadrantAcademique(): ?User
    {
        return $this->id_encadrant_academique;
    }

    public function setIdEncadrantAcademique(?User $id_encadrant_academique): self
    {
        $this->id_encadrant_academique = $id_encadrant_academique;

        return $this;
    }

    public function getIdEncadrantEntreprise(): ?User
    {
        return $this->id_encadrant_entreprise;
    }

    public function setIdEncadrantEntreprise(?User $id_encadrant_entreprise): self
    {
        $this->id_encadrant_entreprise = $id_encadrant_entreprise;

        return $this;
    }
}

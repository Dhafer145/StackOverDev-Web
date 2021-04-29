<?php

namespace App\Entity;

use App\Repository\AffecterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AffecterRepository::class)
 */
class Affecter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="affecters")
     */
    private $nom_etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=User::class,inversedBy="affecters")
     */
    private $nom_encadrant_academique;

    /**
     * @ORM\ManyToOne(targetEntity=User::class,inversedBy="affecters")
     */
    private $nom_encadrant_entreprise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtudiant(): ?User
    {
        return $this->nom_etudiant;
    }

    public function setNomEtudiant(?User $nom_etudiant): self
    {
        $this->nom_etudiant = $nom_etudiant;

        return $this;
    }

    public function getNomEncadrantAcademique(): ?User
    {
        return $this->nom_encadrant_academique;
    }

    public function setNomEncadrantAcademique(?User $nom_encadrant_academique): self
    {
        $this->nom_encadrant_academique = $nom_encadrant_academique;

        return $this;
    }

    public function getNomEncadrantEntreprise(): ?User
    {
        return $this->nom_encadrant_entreprise;
    }

    public function setNomEncadrantEntreprise(?User $nom_encadrant_entreprise): self
    {
        $this->nom_encadrant_entreprise = $nom_encadrant_entreprise;

        return $this;
    }
}

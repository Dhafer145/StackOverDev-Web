<?php

namespace App\Entity;

use App\Repository\CompteRenduRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteRenduRepository::class)
 */
class CompteRendu
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
    private $fichier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $validationcr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentairetud;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $commentairencad;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="crsetudiant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiantcr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getValidationcr(): ?string
    {
        return $this->validationcr;
    }

    public function setValidationcr(string $validationcr): self
    {
        $this->validationcr = $validationcr;

        return $this;
    }

    public function getCommentairetud(): ?string
    {
        return $this->commentairetud;
    }

    public function setCommentairetud(string $commentairetud): self
    {
        $this->commentairetud = $commentairetud;

        return $this;
    }

    public function getCommentairencad(): ?string
    {
        return $this->commentairencad;
    }

    public function setCommentairencad(string $commentairencad): self
    {
        $this->commentairencad = $commentairencad;

        return $this;
    }

    public function getEtudiantcr(): ?User
    {
        return $this->etudiantcr;
    }

    public function setEtudiantcr(?User $etudiantcr): self
    {
        $this->etudiantcr = $etudiantcr;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\JournalProjetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JournalProjetRepository::class)
 */
class JournalProjet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tache;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avis;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="jpsetudiant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiantjp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTache(): ?string
    {
        return $this->tache;
    }

    public function setTache(string $tache): self
    {
        $this->tache = $tache;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(string $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    public function getEtudiantjp(): ?User
    {
        return $this->etudiantjp;
    }

    public function setEtudiantjp(?User $etudiantjp): self
    {
        $this->etudiantjp = $etudiantjp;

        return $this;
    }
}

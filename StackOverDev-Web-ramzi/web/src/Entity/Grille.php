<?php

namespace App\Entity;

use App\Repository\GrilleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GrilleRepository::class)
 */
class Grille
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
    private $dateremp;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $mention;

    /**
     * @ORM\Column(type="float")
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $q1;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $q2;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $q3;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $q4;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $q5;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $q6;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $q7;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $q8;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="grille_enc")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enc_academique;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="etud_grille", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $grille_etudiant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateremp(): ?\DateTimeInterface
    {
        return $this->dateremp;
    }

    public function setDateremp(\DateTimeInterface $dateremp): self
    {
        $this->dateremp = $dateremp;

        return $this;
    }

    public function getMention(): ?string
    {
        return $this->mention;
    }

    public function setMention(string $mention): self
    {
        $this->mention = $mention;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getQ1(): ?string
    {
        return $this->q1;
    }

    public function setQ1(string $q1): self
    {
        $this->q1 = $q1;

        return $this;
    }

    public function getQ2(): ?string
    {
        return $this->q2;
    }

    public function setQ2(string $q2): self
    {
        $this->q2 = $q2;

        return $this;
    }

    public function getQ3(): ?string
    {
        return $this->q3;
    }

    public function setQ3(string $q3): self
    {
        $this->q3 = $q3;

        return $this;
    }

    public function getQ4(): ?string
    {
        return $this->q4;
    }

    public function setQ4(string $q4): self
    {
        $this->q4 = $q4;

        return $this;
    }

    public function getQ5(): ?string
    {
        return $this->q5;
    }

    public function setQ5(string $q5): self
    {
        $this->q5 = $q5;

        return $this;
    }

    public function getQ6(): ?string
    {
        return $this->q6;
    }

    public function setQ6(string $q6): self
    {
        $this->q6 = $q6;

        return $this;
    }

    public function getQ7(): ?string
    {
        return $this->q7;
    }

    public function setQ7(string $q7): self
    {
        $this->q7 = $q7;

        return $this;
    }

    public function getQ8(): ?string
    {
        return $this->q8;
    }

    public function setQ8(string $q8): self
    {
        $this->q8 = $q8;

        return $this;
    }

    public function getEncAcademique(): ?User
    {
        return $this->enc_academique;
    }

    public function setEncAcademique(?User $enc_academique): self
    {
        $this->enc_academique = $enc_academique;

        return $this;
    }

    public function getGrilleEtudiant(): ?User
    {
        return $this->grille_etudiant;
    }

    public function setGrilleEtudiant(User $grille_etudiant): self
    {
        $this->grille_etudiant = $grille_etudiant;

        return $this;
    }
}

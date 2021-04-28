<?php

namespace App\Entity;

use App\Repository\EvaluationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvaluationRepository::class)
 */
class Evaluation
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
     * @ORM\Column(type="boolean")
     */
    private $ponctualite;

    /**
     * @ORM\Column(type="text")
     */
    private $comm1;

    /**
     * @ORM\Column(type="boolean")
     */
    private $integration;

    /**
     * @ORM\Column(type="text")
     */
    private $comm2;

    /**
     * @ORM\Column(type="boolean")
     */
    private $travail;

    /**
     * @ORM\Column(type="text")
     */
    private $comm3;

    /**
     * @ORM\Column(type="boolean")
     */
    private $competence;

    /**
     * @ORM\Column(type="text")
     */
    private $comm4;

    /**
     * @ORM\Column(type="boolean")
     */
    private $eg;

    /**
     * @ORM\Column(type="text")
     */
    private $comm5;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="enc_eval")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_enc_entreprise;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="etudiant_ev", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $eval_etudiant;

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

    public function getPonctualite(): ?bool
    {
        return $this->ponctualite;
    }

    public function setPonctualite(bool $ponctualite): self
    {
        $this->ponctualite = $ponctualite;

        return $this;
    }

    public function getComm1(): ?string
    {
        return $this->comm1;
    }

    public function setComm1(string $comm1): self
    {
        $this->comm1 = $comm1;

        return $this;
    }

    public function getIntegration(): ?bool
    {
        return $this->integration;
    }

    public function setIntegration(bool $integration): self
    {
        $this->integration = $integration;

        return $this;
    }

    public function getComm2(): ?string
    {
        return $this->comm2;
    }

    public function setComm2(string $comm2): self
    {
        $this->comm2 = $comm2;

        return $this;
    }

    public function getTravail(): ?bool
    {
        return $this->travail;
    }

    public function setTravail(bool $travail): self
    {
        $this->travail = $travail;

        return $this;
    }

    public function getComm3(): ?string
    {
        return $this->comm3;
    }

    public function setComm3(string $comm3): self
    {
        $this->comm3 = $comm3;

        return $this;
    }

    public function getCompetence(): ?bool
    {
        return $this->competence;
    }

    public function setCompetence(bool $competence): self
    {
        $this->competence = $competence;

        return $this;
    }

    public function getComm4(): ?string
    {
        return $this->comm4;
    }

    public function setComm4(string $comm4): self
    {
        $this->comm4 = $comm4;

        return $this;
    }

    public function getEg(): ?bool
    {
        return $this->eg;
    }

    public function setEg(bool $eg): self
    {
        $this->eg = $eg;

        return $this;
    }

    public function getComm5(): ?string
    {
        return $this->comm5;
    }

    public function setComm5(string $comm5): self
    {
        $this->comm5 = $comm5;

        return $this;
    }

    public function getIdEncEntreprise(): ?User
    {
        return $this->id_enc_entreprise;
    }

    public function setIdEncEntreprise(?User $id_enc_entreprise): self
    {
        $this->id_enc_entreprise = $id_enc_entreprise;

        return $this;
    }

    public function getEvalEtudiant(): ?User
    {
        return $this->eval_etudiant;
    }

    public function setEvalEtudiant(User $eval_etudiant): self
    {
        $this->eval_etudiant = $eval_etudiant;

        return $this;
    }
}

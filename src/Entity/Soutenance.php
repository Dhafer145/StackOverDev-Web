<?php

namespace App\Entity;

use App\Repository\SoutenanceRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SoutenanceRepository::class)
 */
class Soutenance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="Veuillez saisir le nom du président" )
     */
    private $president;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotNull(message="Veuillez saisir la date" )
     */
    private $date_soutenance;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\NotNull(message="Veuillez saisir une salle" )
     */
    private $salle;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sout_rs")
     */
    private $soutenancers;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sout_enc_ac")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull(message="Veuillez saisir un encadrant" )
     */
    private $sout_enc_ac;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="etud_sout", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull(message="Veuillez saisir un étudiant" )
     */
    private $sout_etud;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPresident(): ?string
    {
        return $this->president;
    }

    public function setPresident(string $president): self
    {
        $this->president = $president;

        return $this;
    }

    public function getDateSoutenance(): ?\DateTimeInterface
    {
        return $this->date_soutenance;
    }

    public function setDateSoutenance(\DateTimeInterface $date_soutenance): self
    {
        $this->date_soutenance = $date_soutenance;

        return $this;
    }

    public function getSalle(): ?string
    {
        return $this->salle;
    }

    public function setSalle(string $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    public function getSoutenancers(): ?User
    {
        return $this->soutenancers;
    }

    public function setSoutenancers(?User $soutenancers): self
    {
        $this->soutenancers = $soutenancers;

        return $this;
    }

    public function getSoutEncAc(): ?User
    {
        return $this->sout_enc_ac;
    }

    public function setSoutEncAc(?User $sout_enc_ac): self
    {
        $this->sout_enc_ac = $sout_enc_ac;

        return $this;
    }

    public function getSoutEtud(): ?User
    {
        return $this->sout_etud;
    }

    public function setSoutEtud(User $sout_etud): self
    {
        $this->sout_etud = $sout_etud;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ProcesVerbalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProcesVerbalRepository::class)
 */
class ProcesVerbal
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
    private $membre_reunion;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="user_pvs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pv_user;

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

    public function getMembreReunion(): ?string
    {
        return $this->membre_reunion;
    }

    public function setMembreReunion(string $membre_reunion): self
    {
        $this->membre_reunion = $membre_reunion;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPvUser(): ?User
    {
        return $this->pv_user;
    }

    public function setPvUser(?User $pv_user): self
    {
        $this->pv_user = $pv_user;

        return $this;
    }
}

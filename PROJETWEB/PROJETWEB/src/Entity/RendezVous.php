<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RendezVousRepository::class)
 */
class RendezVous
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
    private $user_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $raison;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="usr_rdv")
     */
    private $rdvUser;

    public function __construct()
    {
        $this->rdvUser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
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

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): self
    {
        $this->raison = $raison;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getRdvUser(): Collection
    {
        return $this->rdvUser;
    }

    public function addRdvUser(User $rdvUser): self
    {
        if (!$this->rdvUser->contains($rdvUser)) {
            $this->rdvUser[] = $rdvUser;
        }

        return $this;
    }

    public function removeRdvUser(User $rdvUser): self
    {
        $this->rdvUser->removeElement($rdvUser);

        return $this;
    }
}

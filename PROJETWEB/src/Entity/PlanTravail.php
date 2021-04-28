<?php

namespace App\Entity;

use App\Repository\PlanTravailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanTravailRepository::class)
 */
class PlanTravail
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
    private $backlog;

    /**
     * @ORM\Column(type="text")
     */
    private $sprints;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $validation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiantpp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBacklog(): ?string
    {
        return $this->backlog;
    }

    public function setBacklog(string $backlog): self
    {
        $this->backlog = $backlog;

        return $this;
    }

    public function getSprints(): ?string
    {
        return $this->sprints;
    }

    public function setSprints(string $sprints): self
    {
        $this->sprints = $sprints;

        return $this;
    }

    public function getValidation(): ?string
    {
        return $this->validation;
    }

    public function setValidation(string $validation): self
    {
        $this->validation = $validation;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

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

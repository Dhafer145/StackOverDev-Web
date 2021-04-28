<?php

namespace App\Entity;

use App\Repository\ReponsesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponsesRepository::class)
 */
class Reponses
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
    private $rep;

    /**
     * @ORM\ManyToOne(targetEntity=Questions::class, inversedBy="reps_question")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rep_de_quest;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="etud_reps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reps_etud;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRep(): ?string
    {
        return $this->rep;
    }

    public function setRep(string $rep): self
    {
        $this->rep = $rep;

        return $this;
    }

    public function getRepDeQuest(): ?Questions
    {
        return $this->rep_de_quest;
    }

    public function setRepDeQuest(?Questions $rep_de_quest): self
    {
        $this->rep_de_quest = $rep_de_quest;

        return $this;
    }

    public function getRepsEtud(): ?User
    {
        return $this->reps_etud;
    }

    public function setRepsEtud(?User $reps_etud): self
    {
        $this->reps_etud = $reps_etud;

        return $this;
    }
}

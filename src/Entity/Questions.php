<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionsRepository::class)
 */
class Questions
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
    private $quest;

    /**
     * @ORM\Column(type="integer")
     */
    private $IndexPeriode;

    /**
     * @ORM\ManyToMany(targetEntity=Bilan::class, mappedBy="questions_bilan")
     */
    private $questions_bilans;

    /**
     * @ORM\OneToMany(targetEntity=Reponses::class, mappedBy="rep_de_quest")
     */
    private $reps_question;

    public function __construct()
    {
        $this->questions_bilans = new ArrayCollection();
        $this->reps_question = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuest(): ?string
    {
        return $this->quest;
    }

    public function setQuest(string $quest): self
    {
        $this->quest = $quest;

        return $this;
    }

    public function getIndexPeriode(): ?int
    {
        return $this->IndexPeriode;
    }

    public function setIndexPeriode(int $IndexPeriode): self
    {
        $this->IndexPeriode = $IndexPeriode;

        return $this;
    }

    /**
     * @return Collection|Bilan[]
     */
    public function getQuestionsBilans(): Collection
    {
        return $this->questions_bilans;
    }

    public function addQuestionsBilan(Bilan $questionsBilan): self
    {
        if (!$this->questions_bilans->contains($questionsBilan)) {
            $this->questions_bilans[] = $questionsBilan;
            $questionsBilan->addQuestionsBilan($this);
        }

        return $this;
    }

    public function removeQuestionsBilan(Bilan $questionsBilan): self
    {
        if ($this->questions_bilans->removeElement($questionsBilan)) {
            $questionsBilan->removeQuestionsBilan($this);
        }

        return $this;
    }

    /**
     * @return Collection|Reponses[]
     */
    public function getRepsQuestion(): Collection
    {
        return $this->reps_question;
    }

    public function addRepsQuestion(Reponses $repsQuestion): self
    {
        if (!$this->reps_question->contains($repsQuestion)) {
            $this->reps_question[] = $repsQuestion;
            $repsQuestion->setRepDeQuest($this);
        }

        return $this;
    }

    public function removeRepsQuestion(Reponses $repsQuestion): self
    {
        if ($this->reps_question->removeElement($repsQuestion)) {
            // set the owning side to null (unless already changed)
            if ($repsQuestion->getRepDeQuest() === $this) {
                $repsQuestion->setRepDeQuest(null);
            }
        }

        return $this;
    }
}

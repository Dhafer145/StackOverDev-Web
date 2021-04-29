<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @Assert\NotBlank (message="Veuillez ecrire une question")
     */
    private $quest;

    /**
     * @ORM\Column(type="integer")
     * @Assert\LessThan(4)(message=Veuillez choisir 0 , 1 ,2 ou 3)
     */
    private $IndexPeriode;

    /**
     * @ORM\ManyToMany(targetEntity=Bilan::class, mappedBy="questions_bilan")
     */
    private $questions_bilans;



    /**
     * @ORM\OneToMany(targetEntity=Reponses::class, mappedBy="question_de_reponses")
     */
    private $reponses;

    /**
     * @ORM\OneToMany(targetEntity=Reponses::class, mappedBy="question_des_reponses")
     */
    private $lesreponses_dequestion;






    public function __construct()
    {
        $this->questions_bilans = new ArrayCollection();
        $this->reps_question = new ArrayCollection();
        $this->question_reponses = new ArrayCollection();
        $this->lesreponses_dequestion = new ArrayCollection();
        $this->reponses = new ArrayCollection();
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
    public function getLesreponsesDequestion(): Collection
    {
        return $this->lesreponses_dequestion;
    }

    public function addLesreponsesDequestion(Reponses $lesreponsesDequestion): self
    {
        if (!$this->lesreponses_dequestion->contains($lesreponsesDequestion)) {
            $this->lesreponses_dequestion[] = $lesreponsesDequestion;
            $lesreponsesDequestion->setQuestionDesReponses($this);
        }

        return $this;
    }

    public function removeLesreponsesDequestion(Reponses $lesreponsesDequestion): self
    {
        if ($this->lesreponses_dequestion->removeElement($lesreponsesDequestion)) {
            // set the owning side to null (unless already changed)
            if ($lesreponsesDequestion->getQuestionDesReponses() === $this) {
                $lesreponsesDequestion->setQuestionDesReponses(null);
            }
        }

        return $this;
    }





}

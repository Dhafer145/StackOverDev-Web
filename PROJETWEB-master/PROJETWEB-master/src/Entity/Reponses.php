<?php

namespace App\Entity;

use App\Repository\ReponsesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank
     */
    private $rep;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="etud_reps")
     * @ORM\JoinColumn(nullable=true)
     */
    private $reps_etud;

    /**
     * @ORM\ManyToOne(targetEntity=Questions::class, inversedBy="lesreponses_dequestion")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question_des_reponses;

    /**
     * @ORM\Column(type="integer")
     */
    private $IndexPeriode;


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



    public function getRepsEtud(): ?User
    {
        return $this->reps_etud;
    }

    public function setRepsEtud(?User $reps_etud): self
    {
        $this->reps_etud = $reps_etud;

        return $this;
    }

    public function getQuestionDesReponses(): ?Questions
    {
        return $this->question_des_reponses;
    }

    public function setQuestionDesReponses(?Questions $question_des_reponses): self
    {
        $this->question_des_reponses = $question_des_reponses;

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




}

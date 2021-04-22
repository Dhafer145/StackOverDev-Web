<?php

namespace App\Entity;

use App\Repository\BilanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BilanRepository::class)
 */
class Bilan
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
    private $TitreDescriptif;

    /**
     * @ORM\Column(type="integer")
     */
    private $IndexPeriode;

    /**
     * @ORM\ManyToMany(targetEntity=Questions::class, inversedBy="questions_bilans")
     */
    private $questions_bilan;

    public function __construct()
    {
        $this->questions_bilan = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreDescriptif(): ?string
    {
        return $this->TitreDescriptif;
    }

    public function setTitreDescriptif(string $TitreDescriptif): self
    {
        $this->TitreDescriptif = $TitreDescriptif;

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
     * @return Collection|Questions[]
     */
    public function getQuestionsBilan(): Collection
    {
        return $this->questions_bilan;
    }

    public function addQuestionsBilan(Questions $questionsBilan): self
    {
        if (!$this->questions_bilan->contains($questionsBilan)) {
            $this->questions_bilan[] = $questionsBilan;
        }

        return $this;
    }

    public function removeQuestionsBilan(Questions $questionsBilan): self
    {
        $this->questions_bilan->removeElement($questionsBilan);

        return $this;
    }
}

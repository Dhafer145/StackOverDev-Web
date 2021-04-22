<?php

namespace App\Entity;

use App\Repository\RapportFinalRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RapportFinalRepository::class)
 */
class RapportFinal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotNull(message="Veuillez saisir le plagiat" )
     *  @Assert\LessThan(50)(message="veilliez saisir un nombre inférieur à 50")
     */
    private $plagiat;

    /**
     * @ORM\Column(type="string", length=1000)
     * @Assert\NotNull(message="Veuillez choisir un fichier" )
     */
    private $fichier;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="etud_rapport", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)

     */
    private $rapp_etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="enc_ac_rpfs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enc_ac_correction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlagiat(): ?float
    {
        return $this->plagiat;
    }

    public function setPlagiat(float $plagiat): self
    {
        $this->plagiat = $plagiat;

        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getRappEtudiant(): ?User
    {
        return $this->rapp_etudiant;
    }

    public function setRappEtudiant(User $rapp_etudiant): self
    {
        $this->rapp_etudiant = $rapp_etudiant;

        return $this;
    }

    public function getEncAcCorrection(): ?User
    {
        return $this->enc_ac_correction;
    }

    public function setEncAcCorrection(?User $enc_ac_correction): self
    {
        $this->enc_ac_correction = $enc_ac_correction;

        return $this;
    }
}

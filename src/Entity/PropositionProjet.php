<?php

namespace App\Entity;

use App\Repository\PropositionProjetRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PropositionProjetRepository::class)
 * @Vich\Uploadable
 */
class PropositionProjet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\NotNull(message="Veuillez mettre un sujet" )
     */
    private $nom_sujet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cahier_charge;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="proposition_image", fileNameProperty="cahier_charge")
     *
     * @var File|null
     */
    private $imageFile;

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }


    public function setImageFile(?File $imageFile): self
    {
        $this->imageFile = $imageFile;
        if($this->imageFile instanceof UploadedFile)
        {
            $this->updated_at = new \DateTime('now');
        }
        return  $this;
    }

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $validationproposition;

    /**
     * @ORM\Column(type="string", length=1000)
     * @Assert\NotNull(message="Veuillez décire votre projet" )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $commentaireprop;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="ppetudiant", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiantpp;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSujet(): ?string
    {
        return $this->nom_sujet;
    }

    public function setNomSujet(string $nom_sujet): self
    {
        $this->nom_sujet = $nom_sujet;

        return $this;
    }

    public function getCahierCharge(): ?string
    {
        return $this->cahier_charge;
    }

    public function setCahierCharge(?string $cahier_charge): self
    {
        $this->cahier_charge = $cahier_charge;

        return $this;
    }

    public function getValidationproposition(): ?string
    {
        return $this->validationproposition;
    }

    public function setValidationproposition(string $validationproposition): self
    {
        $this->validationproposition = $validationproposition;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCommentaireprop(): ?string
    {
        return $this->commentaireprop;
    }

    public function setCommentaireprop(string $commentaireprop): self
    {
        $this->commentaireprop = $commentaireprop;

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}

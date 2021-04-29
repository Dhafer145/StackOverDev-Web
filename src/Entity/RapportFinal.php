<?php

namespace App\Entity;

use App\Repository\RapportFinalRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=RapportFinalRepository::class)
 * @Vich\Uploadable
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
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="etud_rapport", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)

     */
    private $rapp_etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="enc_ac_rpfs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enc_ac_correction;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="Rapport", fileNameProperty="imageName")
     *
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;


    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }


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

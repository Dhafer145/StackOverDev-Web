<?php

namespace App\Entity;

use App\Repository\PlanTravailRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PlanTravailRepository::class)
 * @Vich\Uploadable
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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="backlog_image", fileNameProperty="backlog")
     *
     * @var File|null
     */
    private $imageFile1;

    public function getImageFile1(): ?File
    {
        return $this->imageFile1;
    }


    public function setImageFile1(?File $imageFile1): self
    {
        $this->imageFile1 = $imageFile1;
        if($this->imageFile1 instanceof UploadedFile)
        {
            $this->updated_at1 = new \DateTime('now');
        }
        return  $this;
    }



    /**
     * @ORM\Column(type="text")
     */
    private $sprints;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="sprint_image", fileNameProperty="sprints")
     *
     * @var File|null
     */
    private $imageFile2;

    public function getImageFile2(): ?File
    {
        return $this->imageFile2;
    }


    public function setImageFile2(?File $imageFile2): self
    {
        $this->imageFile2 = $imageFile2;
        if($this->imageFile2 instanceof UploadedFile)
        {
            $this->updated_at2 = new \DateTime('now');
        }
        return  $this;
    }


    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $validation;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiantpp;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at1;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBacklog(): ?string
    {
        return $this->backlog;
    }

    public function setBacklog(?string $backlog): self
    {
        $this->backlog = $backlog;

        return $this;
    }

    public function getSprints(): ?string
    {
        return $this->sprints;
    }

    public function setSprints(?string $sprints): self
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

    public function getUpdatedAt1(): ?\DateTimeInterface
    {
        return $this->updated_at1;
    }

    public function setUpdatedAt1(?\DateTimeInterface $updated_at1): self
    {
        $this->updated_at1 = $updated_at1;

        return $this;
    }

    public function getUpdatedAt2(): ?\DateTimeInterface
    {
        return $this->updated_at2;
    }

    public function setUpdatedAt2(?\DateTimeInterface $updated_at2): self
    {
        $this->updated_at2 = $updated_at2;

        return $this;
    }
}

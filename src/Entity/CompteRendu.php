<?php

namespace App\Entity;

use App\Repository\CompteRenduRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=CompteRenduRepository::class)
 * @Vich\Uploadable
 */
class CompteRendu
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
    private $fichier;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="compterendu_image", fileNameProperty="fichier")
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $validationcr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentairetud;

    /**
     * @ORM\Column(type="string", length=300,nullable=true)
     */
    private $commentairencad;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="crsetudiant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiantcr;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getValidationcr(): ?string
    {
        return $this->validationcr;
    }

    public function setValidationcr(string $validationcr): self
    {
        $this->validationcr = $validationcr;

        return $this;
    }

    public function getCommentairetud(): ?string
    {
        return $this->commentairetud;
    }

    public function setCommentairetud(string $commentairetud): self
    {
        $this->commentairetud = $commentairetud;

        return $this;
    }

    public function getCommentairencad(): ?string
    {
        return $this->commentairencad;
    }

    public function setCommentairencad(string $commentairencad): self
    {
        $this->commentairencad = $commentairencad;

        return $this;
    }

    public function getEtudiantcr(): ?User
    {
        return $this->etudiantcr;
    }

    public function setEtudiantcr(?User $etudiantcr): self
    {
        $this->etudiantcr = $etudiantcr;

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

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcesVerbal
 *
 * @ORM\Table(name="proces_verbal", uniqueConstraints={@ORM\UniqueConstraint(name="pv_user_id", columns={"pv_user_id"})}, indexes={@ORM\Index(name="IDX_5B95250B207EBA30", columns={"pv_user_id"})})
 * @ORM\Entity
 */
class ProcesVerbal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="membre_reunion", type="string", length=255, nullable=false)
     */
    private $membreReunion;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="user_pvs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pvUser;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getMembreReunion(): ?string
    {
        return $this->membreReunion;
    }

    /**
     * @param string $membreReunion
     */
    public function setMembreReunion(string $membreReunion): void
    {
        $this->membreReunion = $membreReunion;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function getPvUser(): ?User
    {
        return $this->pvUser;
    }


    public function setPvUser(?User $pvUser): void
    {
        $this->pvUser = $pvUser;
    }


}

<?php

namespace App\Entity;

class RecherPlagiat
{

    /**
     * @var int|null
     */
    private $minPlagiat;

    /**
     * @var int|null
     */
    private $maxPlagiat;


    public function getMinPlagiat(): ?int
    {
        return $this->minPlagiat;
    }

    public function setMinPlagiat(int $minPlagiat): self
    {
        $this->minPlagiat = $minPlagiat;

        return $this;
    }

    public function getMaxPlagiat(): ?int
    {
        return $this->maxPlagiat;
    }

    public function setMaxPlagiat(int $maxPlagiat): self
    {
        $this->maxPlagiat = $maxPlagiat;

        return $this;
    }

}
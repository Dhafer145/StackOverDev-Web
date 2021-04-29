<?php

namespace App\Entity;

class PresidentSearch
{

    private $president;


    public function getPresident(): ?string
    {
        return $this->president;
    }

    public function setPresident(string $president): self
    {
        $this->president = $president;

        return $this;
    }
}
<?php


namespace App\Entity;


class PropertySearch
{
    private $userName;

    public function getUserName(): ?string
    {
        return
            $this->userName;
    }
    public function setUserName(string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }
}
<?php

namespace App\Entity;

class GameType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     *
     * @return GameType
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}

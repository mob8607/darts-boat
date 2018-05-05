<?php

namespace App\Entity;

class Player
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
     * @var Game
     */
    private $game;

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
     * @return Player
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Game
     */
    public function getGame(): Game
    {
        return $this->game;
    }

    /**
     * @param Game $game
     *
     * @return self
     */
    public function setGame(Game $game): self
    {
        $this->game = $game;

        return $this;
    }
}

<?php

namespace App\Entity;

class Set
{
    /**
     * @var int
     */
    private $id;

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
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }
}

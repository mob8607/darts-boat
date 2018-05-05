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
     * @var Team
     */
    private $winner;

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

    /**
     * @return null|Team
     */
    public function getWinner(): ?Team
    {
        return $this->winner;
    }

    /**
     * @param null|Team $winner
     *
     * @return self
     */
    public function setWinner(?Team $winner): Set
    {
        $this->winner = $winner;

        return $this;
    }
}

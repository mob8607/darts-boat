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
     * @var Player
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
     * @return null|Player
     */
    public function getWinner(): ?Player
    {
        return $this->winner;
    }

    /**
     * @param null|Player $winner
     *
     * @return self
     */
    public function setWinner(?Player $winner): Set
    {
        $this->winner = $winner;

        return $this;
    }
}

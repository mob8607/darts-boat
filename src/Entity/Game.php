<?php

namespace App\Entity;

class Game
{
    /**
     * @var int
     */
    private $id;

    private $players;

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
     * @return mixed
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param mixed $players
     *
     * @return self
     */
    public function setPlayers($players)
    {
        $this->players = $players;

        return $this;
    }

    /**
     * @param Player $player
     *
     * @return $this
     */
    public function addPlayer(Player $player)
    {
        $this->players[] = $player;

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
    public function setWinner(?Player $winner): Game
    {
        $this->winner = $winner;

        return $this;
    }
}

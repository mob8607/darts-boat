<?php

namespace App\Entity;

class Team
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    private $players;

    private $games;

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
     * @return Team
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
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
     * @return mixed
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * @param mixed $games
     *
     * @return self
     */
    public function setGames($games)
    {
        $this->games = $games;

        return $this;
    }
}

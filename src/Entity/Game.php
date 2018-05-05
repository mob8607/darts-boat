<?php

namespace App\Entity;

class Game
{
    /**
     * @var int
     */
    private $id;

    private $teams;

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
     * @return mixed
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @param mixed $teams
     *
     * @return self
     */
    public function setTeams($teams): self
    {
        $this->teams = $teams;

        return $this;
    }

    /**
     * @param Team $team
     *
     * @return Game
     */
    public function addTeam(Team $team): self
    {
        $this->teams[] = $team;

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
    public function setWinner(?Team $winner): Game
    {
        $this->winner = $winner;

        return $this;
    }
}

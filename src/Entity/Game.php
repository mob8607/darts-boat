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
}

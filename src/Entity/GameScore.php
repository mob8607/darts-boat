<?php

namespace App\Entity;

class GameScore
{
    /**
     * @var array
     */
    private $remainingScoreForTeams;

    /**
     * @var bool
     */
    private $gameFinished = false;

    /**
     * @var bool
     */
    private $legFinished = false;

    public function __construct(Game $game)
    {
        $this->remainingScoreForTeams = [];
        foreach ($game->getTeams() as $team) {
            $this->remainingScoreForTeams[$team->getId()] = 0;
        }
    }

    /**
     * @return bool
     */
    public function isGameFinished(): bool
    {
        return $this->gameFinished;
    }

    /**
     * @param bool $gameFinished
     *
     * @return self
     */
    public function setGameFinished(bool $gameFinished): self
    {
        $this->gameFinished = $gameFinished;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLegFinished(): bool
    {
        return $this->legFinished;
    }

    /**
     * @param bool $legFinished
     *
     * @return self
     */
    public function setLegFinished(bool $legFinished): self
    {
        $this->legFinished = $legFinished;

        return $this;
    }

    /**
     * @param Team $team
     * @param int $remainingScore
     */
    public function setRemainingScoreForTeam(Team $team, int $remainingScore)
    {
        foreach ($this->remainingScoreForTeams as $id => $teamData) {
            if ($team->getId() === $id) {
                $this->remainingScoreForTeams[$id] = $remainingScore;
            }
        }
    }
}

<?php

namespace App\Entity;

class GameScore
{
    /**
     * @var array
     */
    private $remainingScoreForPlayers;

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
        $this->remainingScoreForPlayers = [];
        foreach ($game->getPlayers() as $player) {
            $this->remainingScoreForPlayers[$player->getId()] = 0;
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
     * @param Player $player
     * @param int $remainingScore
     */
    public function setRemainingScoreForPlayer(Player $player, int $remainingScore)
    {
        foreach ($this->remainingScoreForPlayers as $id => $playerData) {
            if ($player->getId() === $id) {
                $this->remainingScoreForPlayers[$id] = $remainingScore;
            }
        }
    }
}

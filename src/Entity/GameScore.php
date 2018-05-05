<?php

namespace App\Entity;

use App\Manager\X01GameManager;

class GameScore
{
    /**
     * @var bool
     */
    private $gameFinished = false;

    /**
     * @var array
     */
    private $players;

    /**
     * @var bool
     */
    private $legFinished = false;

    public function __construct(Game $game, $firstActive = false)
    {
        $this->players = [];
        foreach ($game->getPlayers() as $player) {
            $this->players[] = [
                'id' => $player->getId(),
                'name' => $player->getName(),
                'remaining_score' => X01GameManager::START_SCORE,
                'is_active' => $firstActive,
            ];
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
        foreach ($this->players as &$playerData) {
            if ($player->getId() === $playerData['id']) {
                $playerData['remaining_score'] = $remainingScore;
            }
        }
    }

    public function updateActivePlayer($player, $shootCounter)
    {
        $counter = 0;
        $nextPlayerActive = false;
        foreach ($this->players as &$playerData) {
            if ($nextPlayerActive) {
                $playerData['is_active'] = true;
                $nextPlayerActive = false;
            } else if ($playerData['id'] === $player->getId() && $shootCounter === 2) {
                $playerData['is_active'] = false;
                $nextPlayerActive = true;
            } else if ($playerData['id'] === $player->getId()) {
                $playerData['is_active'] = true;
            }
            if ($nextPlayerActive && $counter === count($this->players) - 1) {
                $this->players[0]['is_active'] = true;
                $nextPlayerActive = false;
            }
            $counter++;
        }
    }
}

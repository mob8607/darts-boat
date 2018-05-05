<?php

namespace App\Entity;

class GameScore
{
    /**
     * @var bool
     */
    private $gameFinished = false;

    /**
     * @var bool
     */
    private $legFinished = false;

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
}

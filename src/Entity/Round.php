<?php

namespace App\Entity;

class Round
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Leg
     */
    private $leg;

    /**
     * @var int
     */
    private $totalScore = 0;

    /**
     * @var Player
     */
    private $player;

    /**
     * @var int
     */
    private $number;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTotalScore(): int
    {
        return $this->totalScore;
    }

    /**
     * @param int $totalScore
     *
     * @return Round
     */
    public function setTotalScore(int $totalScore): self
    {
        $this->totalScore = $totalScore;

        return $this;
    }

    /**
     * @return Leg
     */
    public function getLeg(): Leg
    {
        return $this->leg;
    }

    /**
     * @param Leg $leg
     *
     * @return self
     */
    public function setLeg($leg)
    {
        $this->leg = $leg;

        return $this;
    }

    /**
     * @return Player
     */
    public function getPlayer(): Player
    {
        return $this->player;
    }

    /**
     * @param Player $player
     *
     * @return self
     */
    public function setPlayer(Player $player): self
    {
        $this->player = $player;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     *
     * @return self
     */
    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }
}

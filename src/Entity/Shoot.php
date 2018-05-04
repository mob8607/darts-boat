<?php

namespace App\Entity;

class Shoot
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Round
     */
    private $round;

    /**
     * @var int
     */
    private $score;

    /**
     * @var int
     */
    private $multiplier;

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
     * @return Round
     */
    public function getRound(): Round
    {
        return $this->round;
    }

    /**
     * @param Round $round
     *
     * @return self
     */
    public function setRound($round)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     *
     * @return Shoot
     */
    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return int
     */
    public function getMultiplier(): int
    {
        return $this->multiplier;
    }

    /**
     * @param int $multiplier
     *
     * @return Shoot
     */
    public function setMultiplier(int $multiplier): self
    {
        $this->multiplier = $multiplier;

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

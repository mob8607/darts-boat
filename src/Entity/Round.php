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
    private $score;

    /**
     * @var Player
     */
    private $player;

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
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     *
     * @return Round
     */
    public function setScore(int $score): self
    {
        $this->score = $score;

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
}

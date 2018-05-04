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
}

<?php

namespace App\Entity;

class Leg
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Set
     */
    private $set;

    /**
     * @var Player
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
     * @return Set
     */
    public function getSet(): Set
    {
        return $this->set;
    }

    /**
     * @param Set $set
     *
     * @return self
     */
    public function setSet($set)
    {
        $this->set = $set;

        return $this;
    }

    /**
     * @return null|Player
     */
    public function getWinner(): ?Player
    {
        return $this->winner;
    }

    /**
     * @param null|Player $winner
     *
     * @return self
     */
    public function setWinner(?Player $winner): Leg
    {
        $this->winner = $winner;

        return $this;
    }
}

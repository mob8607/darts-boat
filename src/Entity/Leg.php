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
     * @var Team
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
     * @return null|Team
     */
    public function getWinner(): ?Team
    {
        return $this->winner;
    }

    /**
     * @param null|Team $winner
     *
     * @return self
     */
    public function setWinner(?Team $winner): Leg
    {
        $this->winner = $winner;

        return $this;
    }
}

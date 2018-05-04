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
}

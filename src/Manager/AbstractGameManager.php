<?php

namespace App\Manager;

use App\Entity\Game;
use App\Entity\Player;
use Doctrine\ORM\EntityManager;

abstract class AbstractGameManager
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    abstract public function addScore(Game $game, Player $player, int $multiplier, int $score);

    /**
     * @param bool $gameFinished
     * @param bool $setFinished
     * @param bool $legFinished
     *
     * @return array
     */
    protected function getResult(bool $gameFinished, bool $setFinished, bool $legFinished): array
    {
        return [
            'legFinished' => $legFinished,
            'setFinished' => $setFinished,
            'gameFinished' => $gameFinished,
        ];
    }

    /**
     * @return EntityManager
     */
    protected function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }
}
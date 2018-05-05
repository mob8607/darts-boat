<?php

namespace App\Manager;

use App\Entity\Game;
use App\Entity\GameScore;
use App\Entity\Leg;
use App\Entity\Player;
use App\Entity\Round;
use App\Entity\Set;
use App\Entity\Shoot;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;

abstract class AbstractGameManager
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var ObjectRepository
     */
    protected $setRepository;

    /**
     * @var ObjectRepository
     */
    protected $legRepository;

    /**
     * @var ObjectRepository
     */
    protected $roundRepository;

    /**
     * @var ObjectRepository
     */
    protected $shootRepository;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->setRepository = $entityManager->getRepository(Set::class);
        $this->legRepository = $entityManager->getRepository(Leg::class);
        $this->roundRepository = $entityManager->getRepository(Round::class);
        $this->shootRepository = $entityManager->getRepository(Shoot::class);
    }

    /**
     * @param Game $game
     * @param Player $player
     * @param int $multiplier
     * @param int $score
     *
     * @return GameScore
     */
    abstract public function addScore(Game $game, Player $player, int $multiplier, int $score): GameScore;

    /**
     * @param bool $gameFinished
     * @param bool $setFinished
     * @param bool $legFinished
     *
     * @return array
     */
    protected function getResult(
        bool $gameFinished,
        bool $setFinished,
        bool $legFinished
    ): array {
        return [
            'legFinished' => $legFinished,
            'setFinished' => $setFinished,
            'gameFinished' => $gameFinished,
        ];
    }

    /**
     * @param Game $game
     *
     * @return Set
     */
    protected function createSet(Game $game): Set
    {
        $set = new Set();
        $this->entityManager->persist($set);
        $set->setGame($game);

        return $set;
    }

    /**
     * @param Set $set
     *
     * @return Leg
     */
    protected function createLeg(Set $set): Leg
    {
        $leg = new Leg();
        $this->entityManager->persist($leg);
        $leg->setSet($set);

        return $leg;
    }

    /**
     * @param Leg $leg
     * @param Player $player
     * @param int $number
     *
     * @return Round
     */
    protected function createRound(Leg $leg, Player $player, int $number): Round
    {
        $round = new Round();
        $this->entityManager->persist($round);
        $round->setLeg($leg);
        $round->setPlayer($player);
        $round->setNumber($number);

        return $round;
    }
}
<?php

namespace App\Manager;

use App\Entity\Game;
use App\Entity\Leg;
use App\Entity\Player;
use App\Entity\Round;
use App\Entity\Set;
use App\Entity\Shoot;

class X01GameManager extends AbstractGameManager
{
    private $startScore = 501;
    private $nrOfSets = 1;
    private $nrOfLegs = 3;

    public function addScore(Game $game, Player $player, int $multiplier, int $score)
    {
        // Return true for all values if the game is already finished.
        if ($game->getWinner()) {
            return $this->getResult(true, true, true);
        }

        // Select all sets for the current game.
        $set = new Set();
        $this->getEntityManager()->persist($set);
        $set->setGame($game);

        $leg = new Leg();
        $this->getEntityManager()->persist($leg);
        $leg->setSet($set);

        $round = new Round();
        $this->getEntityManager()->persist($round);
        $round->setLeg($leg);
        $round->setPlayer($player);

        $shoot = new Shoot();
        $this->getEntityManager()->persist($shoot);
        $shoot->setRound($round);
        $shoot->setMultiplier($multiplier);
        $shoot->setScore($score);

        return $this->getResult(false, false, false);
    }
}
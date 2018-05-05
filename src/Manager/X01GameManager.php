<?php

namespace App\Manager;

use App\Entity\Game;
use App\Entity\Player;
use App\Entity\Shoot;

class X01GameManager extends AbstractGameManager
{
    private $startScore = 101;
    private $nrOfSets = 1;
    private $nrOfLegs = 3;
    private $nrOfShoots = 3;

    /**
     * @param Game $game
     * @param Player $player
     * @param int $multiplier
     * @param int $score
     *
     * @return array
     */
    public function addScore(Game $game, Player $player, int $multiplier, int $score): array
    {
        // Return true for all values if the game is already finished.
        if ($game->getWinner()) {
            return $this->getResult(true, true, true);
        }

        // Check if there is already a running set.
        $sets = $this->setRepository->findByGame($game);
        $runningSet = null;
        foreach ($sets as $set) {
            if (!$set->getWinner()) {
                $runningSet = $set;
                break;
            }
        }

        // Create a new set.
        if (!$runningSet && count($sets) < $this->nrOfSets) {
            $runningSet = $this->createSet($game);
        }

        if (!$runningSet) {
            // TODO: This should never happen.
            throw new \Exception('Too many sets.');
        }

        // Check if there is already a running leg.
        $legs = $this->legRepository->findBySet($runningSet);
        $runningLeg = null;
        foreach ($legs as $leg) {
            if (!$leg->getWinner()) {
                $runningLeg = $leg;
                break;
            }
        }

        // Create a new leg.
        if (!$runningLeg && count($legs) < $this->nrOfLegs) {
            $runningLeg = $this->createLeg($runningSet);
        }

        if (!$runningLeg) {
            // TODO: This should never happen.
            throw new \Exception('Too many legs.');
        }

        $round = $this->roundRepository->findLastByLegAndPlayer($runningLeg, $player);
        if (!$round) {
            $round = $this->createRound($runningLeg, $player, 1);
        }

        // Find all shoots for this round.
        $shoots = $this->shootRepository->findByRound($round);
        $shootCount = count($shoots);
        if ($shootCount >= $this->nrOfShoots) {
            $shootCount = 0;
            $round = $this->createRound($runningLeg, $player, $round->getNumber() + 1);
        }

        $shoot = new Shoot();
        $this->entityManager->persist($shoot);
        $shoot->setRound($round);
        $shoot->setMultiplier($multiplier);
        $shoot->setScore($score);
        $shoot->setNumber($shootCount + 1);

        $totalLegScore = $this->roundRepository->sumScoreByLegAndPlayer($runningLeg, $player)['totalLegScore'];
        if (!$totalLegScore) {
            $totalLegScore = 0;
        }

        $currentShootScore = $multiplier * $score;

        if ($currentShootScore + $totalLegScore === $this->startScore) {
            $runningLeg->setWinner($player);
            $round->setTotalScore($round->getTotalScore() + $currentShootScore);
        } else if ($currentShootScore + $totalLegScore > $this->startScore) {
            $shoot->setScore(0);
        } else {
            $round->setTotalScore($round->getTotalScore() + $currentShootScore);
        }

        return $this->getResult(false, false, false);
    }
}
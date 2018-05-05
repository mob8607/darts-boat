<?php

namespace App\Manager;

use App\Entity\Game;
use App\Entity\GameScore;
use App\Entity\Player;
use App\Entity\Shoot;

class X01GameManager extends AbstractGameManager
{
    private $startScore = 80;
    private $nrOfSets = 1;
    private $nrOfSetsToWin = 1;
    private $nrOfLegs = 3;
    private $nrOfLegsToWin = 1;
    private $nrOfShoots = 3;

    /**
     * @param Game $game
     * @param Player $player
     * @param int $multiplier
     * @param int $score
     *
     * @return GameScore
     *
     * @throws \Exception
     */
    public function addScore(Game $game, Player $player, int $multiplier, int $score): GameScore
    {
        $result = new GameScore($game);

        // Return true for all values if the game is already finished.
        if ($game->getWinner()) {
            $result->setGameFinished(true);

            return $result;
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

        $currentNrOfSets = count($sets);
        // Create a new set.
        if (!$runningSet) {
            $runningSet = $this->createSet($game);
            $currentNrOfSets += 1;
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

        $currentNrOfLegs = count($legs);
        // Create a new leg.
        if (!$runningLeg) {
            $runningLeg = $this->createLeg($runningSet);
            $currentNrOfLegs += 1;
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

            // Check if one team has won enough legs, at the moment the game ends after nrOfLegs legs.
            if ($currentNrOfLegs === $this->nrOfLegs) {
                $game->setWinner($player);
            }

            $result->setLegFinished(true);
            $result->setGameFinished(true);

        } else if ($currentShootScore + $totalLegScore > $this->startScore) {
            $shoot->setScore(0);
        } else {
            $round->setTotalScore($round->getTotalScore() + $currentShootScore);
        }

        $result->setRemainingScoreForPlayer($player, $this->startScore - $totalLegScore - $shoot->getScore());
        foreach ($game->getPlayers() as $otherPlayer) {
            if ($otherPlayer->getId() !== $player->getId()) {
                $otherPlayerTotalLegScore = $this->roundRepository->sumScoreByLegAndPlayer($runningLeg, $otherPlayer)['totalLegScore'];
                if (!$otherPlayerTotalLegScore) {
                    $otherPlayerTotalLegScore = 0;
                }

                $result->setRemainingScoreForPlayer($otherPlayer, $otherPlayerTotalLegScore);
            }
        }

        return $result;
    }
}
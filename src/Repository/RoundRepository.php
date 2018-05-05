<?php

namespace App\Repository;

use App\Entity\Leg;
use App\Entity\Player;
use App\Entity\Round;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RoundRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Round::class);
    }

    /**
     * @param Leg $leg
     * @param Player $player
     *
     * @return null|object
     */
    public function findLastByLegAndPlayer(Leg $leg, Player $player)
    {
        $qb = $this->createQueryBuilder('round')
            ->leftJoin('round.leg', 'legs')
            ->leftJoin('round.player', 'players')
            ->andWhere('legs.id = :legId')
            ->andWhere('players.id = :playerId')
            ->setParameter('legId', $leg->getId())
            ->setParameter('playerId', $player->getId())
            ->orderBy('round.number', 'DESC')
            ->setMaxResults(1)
            ->getQuery();

        return $qb->getOneOrNullResult();
    }

    /**
     * @param Leg $leg
     * @param Player $player
     *
     * @return mixed
     */
    public function sumScoreByLegAndPlayer(Leg $leg, Player $player)
    {
        $qb = $this->createQueryBuilder('round')
            ->select('SUM(round.totalScore) as totalLegScore')
            ->leftJoin('round.leg', 'legs')
            ->leftJoin('round.player', 'players')
            ->andWhere('legs.id = :legId')
            ->andWhere('players.id = :playerId')
            ->setParameter('legId', $leg->getId())
            ->setParameter('playerId', $player->getId())
            ->getQuery();

        return $qb->getOneOrNullResult();
    }
}

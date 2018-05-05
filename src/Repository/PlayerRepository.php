<?php

namespace App\Repository;

use App\Entity\Game;
use App\Entity\Player;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PlayerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Player::class);
    }

    /**
     * @param string $name
     * @param Game $game
     *
     * @return null|object
     */
    public function findByNameAndGame(string $name, Game $game)
    {
        $qb = $this->createQueryBuilder('players')
            ->leftJoin('players.team', 'teams')
            ->leftJoin('teams.games', 'games')
            ->andWhere('games.id = :gameId')
            ->andWhere('players.name = :name')
            ->setParameter('gameId', $game->getId())
            ->setParameter('name', $name)
            ->getQuery();

        return $qb->getOneOrNullResult();
    }
}

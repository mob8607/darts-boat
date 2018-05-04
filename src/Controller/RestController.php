<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Player;
use App\Entity\Shoot;
use Doctrine\Common\Persistence\ObjectRepository;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

abstract class RestController extends FOSRestController implements ClassResourceInterface
{
    protected function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }

    /**
     * @return ObjectRepository
     */
    protected function getGameRepository(): ObjectRepository
    {
        return $this->getDoctrine()->getRepository(Game::class);
    }

    /**
     * @return ObjectRepository
     */
    protected function getShootRepository(): ObjectRepository
    {
        return $this->getDoctrine()->getRepository(Shoot::class);
    }

    /**
     * @return ObjectRepository
     */
    protected function getPlayerRepository(): ObjectRepository
    {
        return $this->getDoctrine()->getRepository(Player::class);
    }
}

<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Player;
use App\Entity\Team;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectRepository;

class GameController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @param Request $request
     * @param $id
     *
     * @return Response
     */
    public function getAction(Request $request, $id)
    {
        $example = $this->getRepository()->find($id);
        $view = $this->view($example, 200);

        return $this->handleView($view);
    }

    /**
     * @return Response
     */
    public function cgetAction()
    {
        $examples = $this->getRepository()->findAll();
        $view = $this->view($examples, 200);

        return $this->handleView($view);
    }

    public function postAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $game = new Game();
        $this->getEntityManager()->persist($game);

        foreach ($data['teams'] as $teamData) {
            $team = new Team();
            $this->getEntityManager()->persist($team);
            $team->setName($teamData['name']);

            foreach ($teamData['players'] as $playerData) {
                $player = new Player();
                $this->getEntityManager()->persist($player);
                $player->setName($playerData['name']);
                $player->setTeam($team);

                $team->addPlayer($player);
            }

            $game->addTeam($team);
        }

        $this->getEntityManager()->flush();

        $responseData = ['gameToken' => $game->getId()];

        $view = $this->view($responseData, 200);

        return $this->handleView($view);
    }

    /**
     * @return ObjectRepository
     */
    private function getRepository(): ObjectRepository
    {
        return $this->getDoctrine()->getRepository(Game::class);
    }

    private function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }
}

<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\GameScore;
use App\Entity\Player;
use App\Manager\X01GameManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends RestController
{
    /**
     * @param Request $request
     * @param $id
     *
     * @return Response
     */
    public function getAction(Request $request, $id)
    {
        $example = $this->getGameRepository()->find($id);
        $view = $this->view($example, 200);

        return $this->handleView($view);
    }

    /**
     * @return Response
     */
    public function cgetAction()
    {
        $examples = $this->getGameRepository()->findAll();
        $view = $this->view($examples, 200);

        return $this->handleView($view);
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function postAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $game = new Game();
        $this->getEntityManager()->persist($game);

        foreach ($data['players'] as $playerData) {
            $player = new Player();
            $this->getEntityManager()->persist($player);
            $player->setName($playerData['name']);
            $player->setGame($game);

            $game->addPlayer($player);
        }

        $this->getEntityManager()->flush();

        $responseData = [
            'gameToken' => $game->getId(),
            'game_score' => new GameScore($game, true),
        ];

        $view = $this->view($responseData, 200);

        return $this->handleView($view);
    }
}

<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShootController extends RestController
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function postAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $gameToken = $data['gameToken'];
        $game = $this->getGameRepository()->find($gameToken);
        if (!$game) {
            return new Response('', 400);
        }

        // TODO: Get the correct game manager.
        $gameManager = $this->container->get('App\Manager\X01GameManager');

        $playerId = $data['player']['id'];
        $player = $this->getPlayerRepository()->find($playerId);
        if (!$player) {
            return new Response('', 400);
        }

        $responseData = $gameManager->addScore($game, $player, $data['multiplier'], $data['score']);

        $this->getEntityManager()->flush();

        $view = $this->view($responseData, 200);

        return $this->handleView($view);
    }
}

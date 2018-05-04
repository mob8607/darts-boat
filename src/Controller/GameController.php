<?php

namespace App\Controller;

use App\Entity\Game;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $repository = $this->getDoctrine()->getRepository(Game::class);
        $example = $repository->find($id);

        $view = $this->view($example, 200);

        return $this->handleView($view);
    }

    /**
     * @return Response
     */
    public function cgetAction()
    {
        $repository = $this->getDoctrine()->getRepository(Game::class);
        $examples = $repository->findAll();

        $view = $this->view($examples, 200);

        return $this->handleView($view);
    }
}

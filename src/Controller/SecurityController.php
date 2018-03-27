<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
{
    /**
     * @see https://symfony.com/doc/current/security/json_login_setup.html
     */
    public function login()
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return new Response(500);
        }

        return new Response([
            'username' => $user->getUsername(),
        ]);
    }
}

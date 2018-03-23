<?php

/*
 * This file is part of Sulu.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class AppController
 *
 * @package App\Controller
 */
class AppController extends Controller
{
    public function index()
    {
        return $this->render('base.html.twig');
    }
}

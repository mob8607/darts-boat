<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    public function index()
    {
        return $this->render('base.html.twig');
    }
}

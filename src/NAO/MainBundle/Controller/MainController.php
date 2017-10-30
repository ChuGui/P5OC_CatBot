<?php

namespace NAO\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('NAOMainBundle:Main:home.html.twig');
    }
}

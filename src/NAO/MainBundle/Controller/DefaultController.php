<?php

namespace NAO\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NAOMainBundle:Default:index.html.twig');
    }
}

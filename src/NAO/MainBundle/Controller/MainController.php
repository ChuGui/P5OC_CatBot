<?php

namespace NAO\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class MainController extends Controller
{
    public function homeAction()
    {
        return $this->render('NAOMainBundle:Main:home.html.twig');
    }

    public function observationAction(Request $request)
    {
        // On vérifie que l'utilisateur dispose bien du rôle ROLE_USER
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedException('Accès limité aux utilisateurs.');
        }else{
            return $this->render('NAOMainBundle:Main:observation.html.twig');
        }
    }

    public function adminAction()
    {
        return $this->render('NAOMainBundle:Main:admin.html.twig');
    }
}

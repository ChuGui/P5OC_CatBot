<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction()
    {
        return $this->render('Main/home.html.twig');
    }

    /**
     * @Route("/observation", name="observation")
     */
    public function observationAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $this->get('session')->getFlashBag()->add('error', 'Vous devez-être connecté pour ajouter une observation.');
            $this->redirectToRoute('security_login', array(
            ));
        }
            return $this->render('Main/observation.html.twig');

    }

    public function adminAction()
    {
        return $this->render('NAOMainBundle:Main:admin.html.twig');
    }

    public function profilAction()
    {
        return $this->render('Main/profile.html.twig');
    }
}

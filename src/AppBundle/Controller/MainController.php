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
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/observation", name="observation")
     */
    public function observationAction(Request $request)
    {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $this->addFlash('notice', 'Vous devez-être connecté pour ajouter une observation.');
            return $this->redirectToRoute('security_login');
        }
        return $this->render('main/observation.html.twig');

    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction()
    {

        return $this->render('NAOMainBundle:Main:admin.html.twig');
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profilAction()
    {
        $level = $this->getUser()->getLevel();

        return $this->render('main/profil.html.twig', array(
            'niveau' => $level
        ));
    }

    /**
     * @Route("/actualite", name="actualite")
     */
    public function actualiteAction()
    {
        return $this->render('main/actualite.html.twig', array(
        ));
    }

    /**
     * @Route("/actualite/add", name="addActualite")
     */


    /**
     * @Route("/validation", name="validation")
     */
     public function validationAction()
     {
         if (!$this->get('security.authorization_checker')->isGranted('ROLE_NATURALISTE'))
         {
             $this->addFlash('notice', 'Vous devez-être connecté en tant que "Naturaliste" pour acceder à cette page.');
             return $this->redirectToRoute('security_login');
         }
        return $this->render('main/validation.html.twig');
     }



}


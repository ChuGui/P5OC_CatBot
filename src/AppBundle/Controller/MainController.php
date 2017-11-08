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
    public function observationAction(Request $request, Security $security)
    {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $this->addFlash('notice', 'Vous devez-être connecté pour ajouter une observation.');
            return $this->redirectToRoute('security_login');
        }
        return $this->render('main/observation.html.twig');

    }

    public function adminAction()
    {
        return $this->render('NAOMainBundle:Main:admin.html.twig');
    }

    public function profilAction()
    {
        return $this->render('main/profile.html.twig');
    }

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

    /**
     * @Route("/activate", name="activate")
     */
    public function activateAction(Request $request) {
        $params = array();
        $token = $request->query->get("activate_token");
        var_dump($token);
        /*$em = $this->container->get("doctrine.orm.default_entity_manager");
        $user = $em->getRepository("NamespaceMyBundle:User")->findOneBy(array("token" => $token));
        if ($user != null) {
            $user->setEnabled(true);
            $em->persist($user);
            $em->flush();
            $params["activate"] = true;
        } else {
            $params["activate"] = false;
        }*/
        return $this->render('main/home.html.twig');
    }
}


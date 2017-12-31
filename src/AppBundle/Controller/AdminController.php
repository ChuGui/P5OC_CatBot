<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAllByNameASCExceptAdmin();
        $actualites = $em->getRepository('AppBundle:Actualite')->findAll();
        return $this->render('main/admin.html.twig', array(
            'users' => $users,
            "actualites" => $actualites
        ));
    }


    /**
     * @Route("/admin/delete_user/{id}", name="delete_user", requirements={"id" = "\d+"})
     */
    public function deleteUserAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
        $em->remove($user);
        $em->flush();
        return new Response("L'utilisateur a correctement été supprimée", 200);
    }

    /**
     * @Route("/admin/set_role_naturaliste/{id}", name="set_role_naturaliste", requirements={"id" = "\d+"})
     */
    public function setRoleNaturalisteAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
        $em->remove($user);
        $em->flush();
        return new Response("L'utilisateur a correctement été supprimée", 200);
    }

    /**
     * @Route("/admin/delete_actualite/{id}", name="delete_actualite", requirements={"id" = "\d+"})
     */
    public function deleteActualiteAction($id) {
        $em = $this->getDoctrine()->getManager();
        $actualite = $em->getRepository('AppBundle:Actualite')->find($id);
        $em->remove($actualite);
        $em->flush();
        return new Response("L'actualite à correctement été supprimée", 200);
    }




}

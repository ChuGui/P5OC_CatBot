<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Actualite;
use AppBundle\Entity\User;
use AppBundle\Entity\Comment;
use AppBundle\Form\ChangeEmailForm;
use AppBundle\Form\ChangePasswordForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation;



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
     * @Route("/actualites", name="actualites")
     */
    public function actualitesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $actualites = $em->getRepository(Actualite::class)->findAll();

        return $this->render('main/actualites.html.twig', array(
            'actualites' => $actualites
        ));
    }

    /**
     * @Route("/actualite/{id}", name="actualite", requirements={"id" = "\d+"})
     */
    public function actualiteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $actualite = $em->getRepository(Actualite::class)->findOneBy(array('id'=>$id));
        $userId = $actualite->getUserId();
        $user = $em->getRepository(User::class)->findOneBy(array('id' => $userId));
        $actualiteId = $actualite->getId();
        $comments = $em->getRepository(Comment::class)->findByActualiteId($actualiteId);


        return $this->render('main/actualite.html.twig', array(
            'actualite' => $actualite,
            'user' => $user,
            'comments' => $comments
        ));
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction()
    {
        return $this->render('NAOMainBundle:Main:admin.html.twig');
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction(Request $request)
    {
        $user = $this->getUser();
        $formChangePassword = $this->createForm(ChangePasswordForm::class);
        $formChangeEmail = $this->createForm(ChangeEmailForm::class);
        $formChangeEmail->handleRequest($request);
        if($formChangeEmail->isValid()){
            $userNewEmail = $formChangeEmail['email']->getData();
            var_dump($userNewEmail);
            return $this->render('main/profile.html.twig');
        }



        return $this->render('main/profile.html.twig', array(
            'formChangePassword' => $formChangePassword->createView(),
            'formChangeEmail' => $formChangeEmail->createView(),
            'user' => $user,
        ));
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



}


<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Actualite;
use AppBundle\Entity\User;
use AppBundle\Entity\Comment;
use AppBundle\Form\ChangeEmailForm;
use AppBundle\Form\ChangePasswordForm;
use AppBundle\Form\CommentForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
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
    public function actualiteAction(Actualite $actualite, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $actualite->getUser();
        $comments = $actualite->getComments();
        $comment = New Comment();
        $comment->setActualite($actualite);
        $formComment = $this->createForm(CommentForm::class, $comment);
        $formComment->handleRequest($request);

        return $this->render('main/actualite.html.twig', array(
            'actualite' => $actualite,
            'user' => $user,
            'comments' => $comments,
            'formComment' => $formComment->CreateView()
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

     /**
      * @Route("add/comment/{id}", requirements={"id" = "\d+"}, name="addComment")
      * @Method({"POST"})
      */
      public function addCommentAction(Request $request, $id)
      {
          $user = $this->getUser;
          if($request->isXmlHttpRequest()) {
              $response = new Response();
              $response->headers->set('Content-Type', 'application/json');
              if($user === null) {

                  $response->headers->set('Status', '404');
                  $content = json_encode('Vous devez être connecté pour ajouter un commentaire');
                  $response->setContent($content);

              } else {

                  $em = $this->getDoctrine()->getManager();
                  $comment = new Comment();
                  $formComment = $this->createForm(CommentForm::class, $comment);
                  $formComment->handleRequest($request);
                  if($formComment->isValid()) {
                      $em->persist($comment);
                      $em->flush();
                      $content = json_encode('Félicitations');
                      $response->setContent($content);

                  } else {

                  }


              }



              return $response;

          } else {
              throw $this->createNotFoundException('Mauvaise Route!');
          }
      }





}


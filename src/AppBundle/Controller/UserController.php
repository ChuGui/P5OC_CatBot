<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserRegistrationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Guard\GuardAuthenticatorInterface;

class UserController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     */
     public function registerAction(Request $request)
     {
        $form =  $this->createForm(UserRegistrationForm::class);

        $form->handleRequest($request);
        if($form->isValid())
        {
            /** @var User $user*/
            $user = $form->getData();
            $user->setRoles(['ROLE_LOCKED']);
            $userEmail = $user->getEmail();
            $token = $user->getToken();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();


            $message = (new \Swift_Message('Vos billets pour le Louvre'));
            /*$logoUrl = $message->embed(\Swift_Image::fromPath('bundles/louvreticket/img/louvreLogo.jpg'));*/
            $message
                ->setFrom(array('chugustudio@gmail.com' => "NAO"))
                ->setTo($userEmail)
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody($this->renderView('Security/validationMail.html.twig', array(
                    'token' => $token,
                )), 'text/html');

            $this->addFlash('success', "Bienvenue ! Que l'esprit des oiseaux vous accompagne!");
            return $this->get('security.authentication.guard_handler')->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $this->get('app.security.login_form_authenticator'),
                'main'
            );
        }

        return $this->render('user/register.html.twig', array(
            'form' => $form->createView()
        ));
     }
}
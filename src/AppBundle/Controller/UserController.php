<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserRegistrationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
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

            $user->setIsActive(false);
            $userEmail = $user->getEmail();
            $token = $user->getToken();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $sendConfirmationMail = $this->get('app.mail.send_register_confirmation_mail');
            $sendConfirmationMail->sendRegisterConfirmationMail($userEmail, $token);

            $this->addFlash('notice', "Un email de confirmation vous à été envoyé à l'adresse " . $userEmail);
            return $this->redirectToRoute('user_register');

        }

        return $this->render('user/register.html.twig', array(
            'form' => $form->createView()
        ));
     }

    /**
     * @Route("/activate", name="activate")
     */
     public function activateUserAction(Request $request)
     {
         $token = $request->query->get("token");
         $em = $this->getDoctrine()->getManager();
         $user = $em->getRepository('AppBundle:User')->findOneBy(array('token' => $token));
         if(!$user == null)
         {
             $user->setIsActive(true);
             $em->persist($user);
             $em->flush();

             $this->addFlash('notice', 'Votre compte à bien été validé');
             return $this->get('security.authentication.guard_handler')->authenticateUserAndHandleSuccess(
                 $user,
                 $request,
                 $this->get('app.security.login_form_authenticator'),
                 'main'
             );

         }else{
             $this->addFlash('notice', "Ce compte n'éxiste pas ou plus.");
             return $this->redirectToRoute('homepage');
         }
     }
}
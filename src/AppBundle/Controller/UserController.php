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
            $user->setRoles(['ROLE_USER']);
            $user->setIsActive(false);
            $userEmail = $user->getEmail();
            $token = $user->getToken();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();


            $message = (new \Swift_Message('Confirmation de votre compte NAO'));
            /*$logoUrl = $message->embed(\Swift_Image::fromPath('bundles/louvreticket/img/louvreLogo.jpg'));*/
            $message
                ->setFrom(array('chugustudio@gmail.com' => "NAO"))
                ->setTo($userEmail)
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody($this->renderView('mail/registerValidation.html.twig', array(
                    'token' => $token,
                )), 'text/html');

            $this->addFlash('notice', "Un email de confirmation vous à été envoyé.");
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

    /**
     * @Route("/activate", name="activate")
     */
     public function activateUserAction(Request $request)
     {
         $params = array();
         $token = $request->query->get("token");
         $em = $this->getDoctrine()->getManager();
         $user = $em->getRepository('AppBundle:User')->findOneBy(array('token' => $token));
         if(!$user == null)
         {
             $user->setIsActive(true);
             $em->persist($user);
             $em->flush();

             $this->addFlash('notice', 'Votre compte à bien été validé');
             $this->redirectToRoute('observation');
         }else{
             $this->addFlash('notice', "Ce compte n'éxiste pas ou plus.");
             $this->redirectToRoute('homepage');
         }

         return $this->render('security/activate.html.twig');


     }
}
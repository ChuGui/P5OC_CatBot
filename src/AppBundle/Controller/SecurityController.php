<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UserRegistrationForm;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use AppBundle\Form\LoginForm;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\User;
use Symfony\Component\Security\Guard\GuardAuthenticatorInterface;
class SecurityController extends Controller
{

    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        //On verifie que l'url de redirection provient de observation pour envoyer un flash message à login.html.twig
        $session = new Session();
        $attribute = $session->all();
        if (isset($attribute['sf_redirect']['route']) && ($attribute['sf_redirect']['route'] === 'observation')) {
            $this->addFlash('notice', 'Pour ajouter une obsevation, vous devez être connecté.');
        }

        $form = $this->createForm(LoginForm::class, array(
            '_username' => $lastUsername
        ));

        return $this->render('security/login.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));
    }


    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('Ceci ne devrait pas être atteint');
    }

    /**
     * @Route("/register", name="user_register")
     */
    public function registerAction(Request $request)
    {
        $form = $this->createForm(UserRegistrationForm::class);

        $form->handleRequest($request);
        if ($form->isValid()) {
            /** @var User $user */
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

}
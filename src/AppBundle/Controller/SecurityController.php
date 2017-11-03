<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use AppBundle\Form\LoginForm;

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

        $form = $this->createForm(LoginForm::class, array(
            '_username' => $lastUsername
        ));

        return $this->render('security/login.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('Ceci ne devrait pas être atteint');
    }

}
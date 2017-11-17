<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UserRegistrationForm;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use AppBundle\Form\LoginForm;
use Symfony\Component\HttpFoundation\Session\Session;

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
        if (isset($attribute['sf_redirect']['route']) && ($attribute['sf_redirect']['route'] === 'observation'))
        {
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

    /**
     * @Route("/change", name="change")
     *
     */
    public function changeAction(Request $request)
    {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER'))
        {
            $message = "Vous devez être connecté pour accéder à cette page";
            return $this->render('error/accessDenied.html.twig',array(
                'message'=>$message,
            ));
        }else{
            $params = $request->request->all();
            if (!array_key_exists("current", $params)
                || !array_key_exists("new", $params)
                || !array_key_exists("new2", $params))
            {
                return array("error" => "S'il vous plaît, veuillez renseigner tous les champs");
            }else{

            }
            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();

        }


    }



}
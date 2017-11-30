<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserRegistrationForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Security\Guard\GuardAuthenticatorInterface;
use AppBundle\Form\LoginForm;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    /**
     * @Route("/activate", name="activate")
     */
    public function activateUserAction(Request $request)
    {
        $token = $request->query->get("token");
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('token' => $token));
        if (!$user == null) {
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

        } else {
            $this->addFlash('notice', "Ce compte n'éxiste pas ou plus.");
            return $this->redirectToRoute('homepage');
        }
    }

    /**
     *
     * @Route("/change/email", name="changeEmail")
     *
     */
    public function changeEmailAction(Request $request)
    {

        /*if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $message = "Vous devez être connecté pour accéder à cette page";
            return $this->render('error/accessDenied.html.twig', array(
                'message' => $message,
            ));
        } else {
            $params = $request->request->all();
            if (!array_key_exists("password", $params)
                || !array_key_exists("newEmail", $params)
                || !array_key_exists("repeatEmail", $params)) {
                return array("error" => "S'il vous plaît, veuillez renseigner tous les champs");
            } else {

            }*/
        /*$em = $this->getDoctrine()->getManager();*/
        $user = $this->getUser();
        $password = $user->getPlainPassword();
        var_dump($password);
        return $this->render('main/home.html.twig');

    }

    /**
     * @Method({"POST"})
     * @Route("/changePassword", name="changePassword")
     *
     */
    public function changePasswordAction(Request $request)
    {


    }

    /**
     * @Method({"POST"})
     * @Route("/reset", name="reset")
     */
    public function resetAction(Request $request)
    {
        $params = $request->request->all();
        if (!array_key_exists("username", $params)) {
            throw new \Exception("Aucun pseudo donnée");
        }

        $username = &$params["username"];
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array("username" => $username));
        if($user == null)
        {
            $this->addFlash('error', "Ce pseudo est inconnu.");
            return $this->redirectToRoute('security_login');
        }
        $length = 10;
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        $randomPassword = hash('crc32',$randomString);
        $userToken = $user->getToken();
        $userEmail = $user->getEmail();
        $sendResetPasswordMail = $this->get('app.mail.send_reset_password_mail');
        $sendResetPasswordMail->sendResetPasswordMail($userEmail, $randomPassword, $userToken);
        $this->addFlash('notice', "Un email avec votre nouveau mot de passe vous à été envoyé à l'adresse " . $user->getEmail());
        return $this->redirectToRoute('security_login');
    }

    /**
     * @Route("/reset/now", name="reset_now")
     */
    public function resetNowAction(Request $request)
    {
        $token = $request->query->get("token");
        $newPassword = $request->query->get("password");
        if($token=null || $newPassword=null)
        {
            $this->render('error/error.html.twig'
            );
        }
        return $this->render('main/home.html.twig');
        /*$em = $this->getDoctrine()->getManager();
        $user = $em->getRepository()->findOneBy(array('token'=>$token));
        $user->setPassword($newPassword);
        $em->persist($user);
        $em->flush();
        $this->addFlash('notice', 'Vos informations on été mises à jours');

        return $this->RedirectToRoute('security_login');*/
    }

    /**
     * @Method({"POST"})
     * @Route("/change/pseudo", name="changePseudo")
     */
    public function changePseudoAction(Request $request) {
        $pseudo = $request->request->get('pseudo');
        $user = $this->getUser();
        $user->setPseudo($pseudo);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('profile');
    }
}
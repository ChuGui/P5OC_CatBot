<?php
namespace AppBundle\Service;

use Symfony\Component\Templating\EngineInterface;
class SendResetPasswordMail
{
    private $twig;
    private $mailer;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function sendResetPasswordMail($userEmail, $password, $token)
    {
        $message = (new \Swift_Message('Votre nouveau mot de passe'));
        /*$logoUrl = $message->embed(\Swift_Image::fromPath('bundles/louvreticket/img/louvreLogo.jpg'));*/
        $message
            ->setFrom(array('chugustudio@gmail.com' => "NAO"))
            ->setTo($userEmail)
            ->setCharset('utf-8')
            ->setContentType('text/html')
            ->setBody($this->twig->render('mail/resetPassword.html.twig', array(
                'password' => $password,
                'token' => $token
            )), 'text/html');
        return $this->mailer->send($message);
    }
}
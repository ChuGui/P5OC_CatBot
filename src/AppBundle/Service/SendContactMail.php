<?php
namespace AppBundle\Service;

use Symfony\Component\Templating\EngineInterface;
class SendContactMail
{
    private $twig;
    private $mailer;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function sendContactMail($userEmail, $subject, $content, $naoContact)
    {
        $message = (new \Swift_Message($subject));
        /*$logoUrl = $message->embed(\Swift_Image::fromPath('bundles/louvreticket/img/louvreLogo.jpg'));*/
        $message
            ->setFrom(array($userEmail => $userEmail))
            ->setTo($naoContact)
            ->setCharset('utf-8')
            ->setContentType('text/html')
            ->setBody($this->twig->render('mail/contactMail.html.twig', array(
                'content' => $content,
                'mail' => $userEmail
            )), 'text/html');
        return $this->mailer->send($message);
    }
}
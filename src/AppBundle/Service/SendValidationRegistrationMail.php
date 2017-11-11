<?php
namespace AppBundle\Service;


class SendValidationRegistrationMail
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendValidationRegistrationMail($mail, $token)
    {

    }

}
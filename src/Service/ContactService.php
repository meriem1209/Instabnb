<?php

namespace App\Service;


class ContactService
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer= $mailer;

    }


    public function send(string $message)
    {
        $this->mailer->send(new \Swift_Message($message))
            ->setTo('test@test.com')
            ->setBody($message);
    }
}
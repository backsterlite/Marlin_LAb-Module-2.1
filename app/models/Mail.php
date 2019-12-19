<?php


namespace App\models;


use SimpleMail;

class Mail
{
    private $mailer;
    public function __construct(SimpleMail $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send($mail,  $message,$subject, $name = 'Guest')
    {
        $this->mailer->setTo($mail, $name)
            ->setSubject($subject)
            ->setFrom(config('Mail')['Admin']['email'], config('Mail')['Admin']['name'])
            ->setHtml()
            ->setMessage($message)
            ->setWrap(100);
            return $send = $this->mailer->send();

    }



}
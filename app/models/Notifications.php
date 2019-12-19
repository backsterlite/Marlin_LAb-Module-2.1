<?php


namespace App\models;


class Notifications
{
    private $mailer;
    public function __construct(Mail $mail)
    {
        $this->mailer = $mail;

    }

    public function emailVerifications($email, $name, $selector, $token)
    {
        $subject = 'Welcome '. $name.' in our family';
        $message = 'Hello '.$name.', if you want  to continue, follow the link bellow<br>'.'<a href="http://marlinpaidcourse/user/email_verification?selector=' .
            \urlencode($selector) . '&token=' . \urlencode($token) . '">Contine Register</a>';
         return $this->mailer->send($email, $name, $message,$subject);
    }
    public function forgotPassword($email,  $selector, $token)
    {
        $subject = 'Change Password';
        $message = 'Hello , if you want  to continue, follow the link bellow<br>'.'<a href="http://marlinpaidcourse/user/reset_password?selector=' .
            \urlencode($selector) . '&token=' . \urlencode($token) . '">Change Password</a>';
        return $this->mailer->send($email,  $message, $subject);
    }
}
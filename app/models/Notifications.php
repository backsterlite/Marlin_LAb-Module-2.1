<?php


namespace App\models;


use SimpleMail;

class Notifications
{
    private $mailer,
            $token,
            $selector;

    public function __construct()
    {
        $this->mailer =  new SimpleMail();
    }

    public function emailVerification($mail, $selector, $token)
    {
        $this->selector = $selector;
        $this->token = $token;

        return $this->mailer->setTo($mail, 'Recipient 1')
            ->setSubject('Testing multiple attachments!')
            ->setFrom('info@backster.com', 'Mail Bot')
            ->setParameters($selector)
            ->setMessage($this->GetBody())
            ->setHtml();



    }

    private function GetBody()
    {
        // считываем шаблон письма
        $body = file_get_contents(dirname(__DIR__) . '/View/mail/verification.php');
        // подставляем данные в шаблон
        $body = $this->SubstituteData($body, $this->token, $this->selector);
        // аттачим все картинки, с подходящими imgPath и расширениями jpg, png, gif, заменяем атрибуты src в тегах img
        // 'self::AddImage' будет работать для php > 5.3, для 5.2 нужно заменить на array($this, 'AddImage')
        return $body;
    }


    private function SubstituteData($str, $token, $selector)
    {
        $data = [];
        $data['token1'] = $token;
        $data['selector1'] = $selector;
        foreach($data as $k => $v)
            $str = str_replace($k, $v, $str);
        return $str;
    }

}
<?php


namespace App\controllers;


use App\models\Connection;
use App\models\Notifications;
use App\models\QueryBuilder;
use Delight\Auth\Auth;
use PDO;

class UserController extends Controller
{
    protected $auth;
    private $mailer;


    public function __construct( Auth $auth)
    {
        parent::__construct($this->queryBuilder);
        $this->auth = $auth;
        $this->mailer = new Notifications();

    }

    public function showRegisterForm()
    {
        echo $this->view->render('user/register');
    }

    public function signUp()
    {
        try {
            $userId = $this->auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
                $mail = $this->mailer->emailVerification($_POST['email'], $selector, $token);
                $send = $mail->send();
                if ($send) {
                    flash()->success('На вашу почту ' . $_POST['email'] . ' отправлено письмо с подтверждением. Пожалуйста проверте
                                    Вашу почту' );
                } else {
                   flash()->error( 'Could not send email please try again later');
                }
                redirect('/user/login');
               /* echo '<a href="/user/email_verification?selector='. \urlencode($selector) . '&token=' .\urlencode($token)
                    . '">Перейдите по ссылке для верификации Email</a>';*/
               /* d( '<a href="/user/email_verification?selector='. \urlencode($selector) . '&token=' .\urlencode($token)
                . '">Перейдите по ссылке для верификации Email</a>');die;*/
            });

        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Invalid email address');
            back();

        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Invalid password');
            back();
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('User already exists');
            back();
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            back();
        }
    }

    public function showLoginForm()
    {
        echo $this->view->render('user/login');
    }

    public function signIn()
    {
        $rememberDuration = null;
        if($_POST['remember'] == 1)
        {
             $rememberDuration = (int) (60 * 60 * 24 * 365.25);
        }
        try {
            $this->auth->login($_POST['email'], $_POST['password'],$rememberDuration);
            redirect('/');
            exit;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Wrong email address');
            back();
            exit;
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Wrong password');
            back();
            exit;
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            flash()->error('Email not verified');
            back();
            exit;
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            back();
            exit;
        }
    }

    public function logOut()
    {
        $this->auth->logOut();
        redirect('/');
        exit;
    }


}
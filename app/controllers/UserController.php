<?php


namespace App\controllers;


use App\models\Connection;
use Delight\Auth\Auth;

class UserController extends Controller
{
    protected $auth;
    public function __construct()
    {
        parent::__construct();
        $this->auth = new Auth(Connection::make(config('database')));
    }

    public function showRegisterForm()
    {
        echo $this->view->render('user/register');
    }

    public function signUp()
    {
        try {
            $userId = $this->auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
                d($selector,$token);
                echo '<a href="/user/email_verification?selector='. \urlencode($selector) . '&token=' .\urlencode($token)
                    . '">Перейдите по ссылке для верификации Email</a>';
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
        try {
            $this->auth->login($_POST['email'], $_POST['password']);
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
<?php


namespace App\controllers;


use Delight\Auth\Auth;

class UserController extends Controller
{
    private $auth;
    public function __construct(Auth $auth)
    {
        parent::__construct();
        $this->auth = $auth;
    }

    public function login()
    {

        echo $this->view->render('user/login');
    }

    public function signIn()
    {
        $request = $_POST['request'];
        $rememberDuration = null;
        if($_POST['remember'] == "1")
        {
            $rememberDuration = (int) (60 * 60 * 24 * 365.25);
        }
        try {
            $this->auth->login($_POST['email'], $_POST['password'], $rememberDuration);
            flash()->success('User is logged in');
            redirect($request);
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

    public function register()
    {
        echo $this->view->render('user/register');
    }


}
<?php


namespace App\controllers;


use Delight\Auth\Auth;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;
use Valitron\Validator;

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
        if($this->validateLogin($_POST))
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


    }

    public function register()
    {
        echo $this->view->render('user/register');
    }

    public function signUp()
    {
        if($this->validateRegister())
        {
            try {
                $userId = $this->auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
                    echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
                });

                echo 'We have signed up a new user with the ID ' . $userId;
            }
            catch (\Delight\Auth\InvalidEmailException $e) {
                flash()->error('Invalid email address');
                back();
                exit;
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                flash()->error('Invalid password');
                back();
                exit;
            }
            catch (\Delight\Auth\UserAlreadyExistsException $e) {
                flash()->error('User already exists');
                back();
                exit;
            }
            catch (\Delight\Auth\TooManyRequestsException $e) {
                flash()->error('Too many requests');
                back();
                exit;
            }
        }
    }

    private function validateRegister()
    {
        $validator = v::key('username', v::stringType()->notEmpty())
            ->key('email', v::email())
            ->key('password', v::stringType()->notEmpty())
            ->key('terms', v::trueVal())
            ->keyValue('password_confirmation', 'equals', 'password');

        try {
            $validator->assert($_POST);

        } catch (ValidationException $exception) {
            $exception->findMessages($this->getMessages());
            flash()->error($exception->getMessages());

            back();
            exit;
        }
    }
    private function validateLogin()
    {
        $validator = v::key('email', v::email())
            ->key('password', v::stringType()->notEmpty());

        try {
            return  $validator->assert($_POST);


        } catch (ValidationException $exception) {
            $exception->findMessages($this->getMessages());
            flash()->error($exception->getMessages());

            back();
            exit;
        }
    }




    private function getMessages()
    {
        return [
            'terms'   =>  'Вы должны согласится с правилами.',
            'username' => 'Введите имя',
            'email' => 'Неверный формат e-mail',
            'password'  =>  'Введите пароль',
            'password_confirmation' =>  'Пароли не сопадают'
        ];
    }

}
<?php


namespace App\controllers;


use App\models\ImageManager;
use Delight\Auth\Auth;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;
use App\models\Notifications;

class UserController extends Controller
{
    private $auth;
    private $notifications;

    private $manager;

    public function __construct(Auth $auth, Notifications $notifications, ImageManager $manager)
    {
        parent::__construct();
        $this->auth = $auth;
        $this->notifications = $notifications;
        $this->manager = $manager;
    }

    public function login()
    {

        echo $this->view->render('user/login');
    }

    public function signIn()
    {
        if($this->validateLogin())
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
                    $success = $this->notifications->emailVerifications($_POST['email'], $_POST['username'], $selector, $token);
                    $_SESSION['request_email'] = $_POST['email'];
                    if(!$success)
                    {
                        flash()->error('В связи с проблемами на сервере не удалось отправить сообщение. Перейдите по ссылке
                                        "Resend request"');
                        back();
                        exit;
                    }
                });
                flash()->success('На вашу почту "' .$_POST['email']. '" отправлено письмо с подтверждением регистрации.
                                    Зайдите на вашу почту для завершения регистрации');
                back();
                exit;
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
            return $validator->assert($_POST);

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
    private function validateProfileChangeInfo()
    {
        $validator = v::key('email', v::email())
            ->key('username', v::stringType()->notEmpty());

        try {
            return  $validator->assert($_POST);


        } catch (ValidationException $exception) {
            $exception->findMessages($this->getMessages());
            flash()->error($exception->getMessages());
            back();
            exit;
        }
    }
    private function validateProfileChangeSecurity()
    {
        $validator = v::key('password', v::stringType()->notEmpty())
                    ->keyValue('password_confirmation', 'equals', 'password');;
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

    public function emailVerification()
    {
        try {
            $this->auth->confirmEmail($_GET['selector'], $_GET['token']);

           flash()->success('Email address has been verified');
           redirect('/user/login');
           exit;
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('Invalid token');
            redirect('/user/register');
            exit;
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('Token expired');
            redirect('/user/register');
            exit;
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('Email address already exists');
            redirect('/user/register');
            exit;
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            redirect('/user/register');
            exit;
        }
    }
     public function showForgotPasswordForm()
    {
        echo $this->view->render('user/forgotPassword');
    }

    public function forgotPasswordInitiatingRequest()
    {
        try {
            $this->auth->forgotPassword($_POST['email'], function ($selector, $token) {
                $_SESSION['request_email'] = $_POST['email'];
                $success = $this->notifications->forgotPassword($_POST['email'], $selector, $token);
                if(!$success)
                {
                    flash()->error('В связи с проблемами на сервере не удалось отправить сообщение. Перейдите по ссылке
                                        "Resend request"');
                    back();
                    exit;
                }
            });
            flash()->success('На вашу почту "' .$_POST['email']. '" отправлено письмо с подтверждением .
                                    Зайдите на вашу почту для завершения смены пароля');
            back();
            exit;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Invalid email address');
            back();
            exit;
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            flash()->error('Email not verified');
            back();
            exit;
        }
        catch (\Delight\Auth\ResetDisabledException $e) {
            flash()->error('Password reset is disabled');
            back();
            exit;
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            back();
            exit;
        }
    }

    public function canResetPassword()
    {
        try {
            $this->auth->canResetPasswordOrThrow($_GET['selector'], $_GET['token']);

            echo $this->view->render('user/changePassword', ['selector' => $_GET['selector'], 'token' => $_GET['token']]);
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('Invalid token');
            redirect('/user/forgot_password');
            exit;
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('Token expired');
            redirect('/user/forgot_password');
            exit;
        }
        catch (\Delight\Auth\ResetDisabledException $e) {
            flash()->error('Password reset is disabled');
            redirect('/user/forgot_password');
            exit;
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            redirect('/user/forgot_password');
            exit;
        }
    }

    public function changePassword()
    {
        try {
            $this->auth->resetPassword($_POST['selector'], $_POST['token'], $_POST['password']);

            flash()->success('Пароль успешно изменен');
            redirect('/user/login');
            exit;
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('Invalid token');
            back();
            exit;
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('Token expired');
            back();
            exit;
        }
        catch (\Delight\Auth\ResetDisabledException $e) {
            flash()->error('Password reset is disabled');
            back();
            exit;
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Invalid password');
            back();
            exit;
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            back();
            exit;
        }
    }

    public function logout()
    {
        $this->auth->logOut();
        redirect('/');
        exit;
    }
    public function resendEmailMessage()
    {
        try {
            $this->auth->resendConfirmationForEmail($_SESSION['request_email'], function ($selector, $token) {
                if($_SERVER['HTTP_REFERER'] == '/user/register')
                {
                    $this->notifications->emailVerifications($_POST['email'], $_POST['username'], $selector, $token);
                }elseif ($_SERVER['HTTP_REFERER'] == '/user/forgot_password')
                {
                    $this->notifications->forgotPassword($_POST['email'], $selector, $token);
                }
            });
            if($_SERVER['HTTP_REFERER'] == '/user/register')
            {
                flash()->success('На вашу почту "' .$_POST['email']. '" отправлено письмо с подтверждением регистрации.
                                    Зайдите на вашу почту для завершения регистрации');
                back();
                exit;
            }elseif ($_SERVER['HTTP_REFERER'] == '/user/forgot_password')
            {
                flash()->success('На вашу почту "' .$_POST['email']. '" отправлено письмо с подтверждением .
                                    Зайдите на вашу почту для завершения смены пароля');
                back();
                exit;
            }


        }
        catch (\Delight\Auth\ConfirmationRequestNotFound $e) {
            flash()->error('No earlier request found that could be re-sent');
            back();
            exit;
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('There have been too many requests -- try again later');
            back();
            exit;
        }
    }

    public function showProfile($id)
    {
        if($this->auth->getUserId() == $id)
        {
            $user = $this->database->find('users', 'id', $id);
            echo $this->view->render('user/profile', compact('user'));
        }else{
            redirect('/');
            exit;
        }


    }

    public function editProfileInfo($id)
    {
        try{
             $file = $this->manager->verificationImage($_FILES['image']);
        }catch (\Exception $e)
        {
            flash()->error($e->getMessage());
            back();
            exit;
        }
        if($file)
        {
            $image = $this->database->find('users', 'id', $id);
            $data = [
                'username' => $_POST['username'],
                'email'    => $_POST['emai'],
                'image'    => '$file'
            ];
            if($this->validateProfileChangeInfo())
            {
                try{
                    $this->database->update('users', $data, 'id', $id);
                }catch (\Exception $e)
                {
                    flash()->error('Операция не удалась. Пожалуйста попробуйте позже');
                    back();
                    exit;
                }
                $this->manager->add($_FILES['image'], 'user', $file, $image['image']);
                flash()->success('Данные успешно обновлены');
                back();
                exit;
            }
        }

    }

    public function editProfileSecurity($id)
    {
        if($this->validateProfileChangeSecurity())
        {
            try {
                $this->auth->changePassword($_POST['oldPassword'], $_POST['newPassword']);

                flash()->success('Password has been changed');
                back();
                exit;
            }
            catch (\Delight\Auth\NotLoggedInException $e) {
                flash()->error('Not logged in');
                back();
                exit;
            }
            catch (\Delight\Auth\InvalidPasswordException $e) {
                flash()->error('Invalid password(s)');
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

}
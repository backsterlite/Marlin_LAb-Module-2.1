<?php


namespace App\controllers;


class VerificationController extends UserController
{
    public function emailVerification()
    {
        try {
            $this->auth->confirmEmail($_GET['selector'], $_GET['token']);

            flash()->success( 'Email address has been verified');
            redirect('/user/login');
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('Invalid token');
            redirect('/user/register');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('Token expired');
            redirect('/user/register');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('Email address already exists');
            redirect('/user/register');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Too many requests');
            redirect('/user/register');
        }
    }
}
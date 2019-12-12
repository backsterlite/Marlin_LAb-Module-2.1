<?php


namespace App\controllers;


class ErrorsController extends Controller
{
    public function error404()
    {
        include dirname(__DIR__) . '/View/errors/404/index.html';
    }

    public function error405()
    {
        include dirname(__DIR__) . '/View/errors/405/index.html';
    }

}
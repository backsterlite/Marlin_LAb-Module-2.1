<?php


namespace App\controllers;

class ErrorsController extends Controller
{
    public function error404()
    {
        $this->view->setFileExtension('html');
        echo $this->view->render('/errors/404/index');
    }

    public function error405()
    {
        $this->view->setFileExtension('html');
        echo $this->view->render('/errors/405/index');

    }

}
<?php


namespace App\controllers;

 class Controller
{
    protected $database;
    protected $view;

    public function __construct()
   {

       $this->database = components(\App\models\Database::class);
       $this->view = components(\League\Plates\Engine::class);
   }


}
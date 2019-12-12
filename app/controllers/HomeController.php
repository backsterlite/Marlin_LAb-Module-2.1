<?php


namespace App\controllers;





class HomeController extends Controller
{


    public function index()
    {

        $posts = $this->queryBuilder->all('comments');
        include dirname(__DIR__) . '/View/home.php';

    }

}
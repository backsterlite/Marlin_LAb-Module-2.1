<?php


namespace App\controllers;





class HomeController extends Controller
{


    public function index()
    {

        $posts = $this->queryBuilder->all('comments');
        echo $this->view->render('home', ['posts' => $posts]);

    }

}
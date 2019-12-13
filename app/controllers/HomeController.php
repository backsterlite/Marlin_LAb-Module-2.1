<?php


namespace App\controllers;





class HomeController extends Controller
{


    public function index()
    {

        $posts = $this->queryBuilder->all('comments');
        $method = __METHOD__;
        echo $this->view->render('home', ['posts' => $posts, 'method' => $method]);

    }

}
<?php


namespace App\controllers;





class HomeController extends Controller
{


    public function index()
    {
        $totalItems = $this->queryBuilder->allCount('comments');
        $itemsPerPage = 8;
        $currentPage = $_GET['page'] ?? 1;
        $urlPattern = '/?page=(:num)';
        $paginator = $this->paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $paginator->setMaxPagesToShow(5);
        $posts = $this->queryBuilder->allPaginate('comments',  $currentPage, $itemsPerPage);
        echo $this->view->render('home', ['posts' => $posts, 'paginator' => $paginator]);

    }

}
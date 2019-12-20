<?php


namespace App\controllers;

use Carbon\Carbon;
use JasonGrimes\Paginator;

class PostController extends Controller
{

    public function showCategory($id)
    {
        $totalItems = $this->database->getCount('posts', 'category_id', $id);
        $itemsPerPage = 2;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern ='?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

        $posts = $this->database->getPaginatedFrom('posts', 'category_id', $id,  $currentPage, $itemsPerPage);
        $comments = $this->database->allASC('comments');
        $now = Carbon::now('Europe/Kiev');
        echo $this->view->render('category/one_category', compact('posts',
            'comments', 'now','paginator'));
    }

    public function showOne($id)
    {
        $totalItems = $this->database->getCount('comments', 'post_id', $id);
        $itemsPerPage = 2;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern ='?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $post = $this->database->find('posts', 'id', $id);
        $comments = $this->database->getPaginatedFrom('comments', $post['id'], $id,  $currentPage, $itemsPerPage);

        echo $this->view->render('post/showOne', compact('post', 'comments', 'paginator'));

    }
}
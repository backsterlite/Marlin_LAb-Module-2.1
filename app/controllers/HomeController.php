<?php


namespace App\controllers;





use Carbon\Carbon;
use JasonGrimes\Paginator;

class HomeController extends Controller
{


    public function index()
    {
        $posts = $this->database->allDESC('posts');
        $totalItems = count($posts);
        $itemsPerPage = 1;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern = '/?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

        $posts = $this->database->getPaginated('posts', $currentPage, $itemsPerPage);
        $featuredPosts = $this->database->getFields('posts', 'is_featured', 8);
        $popularPosts = $this->database->allDESC('posts', 'views', 8);
        $tags = $this->database->allDESC('tags', 'post_counter', 15);
        $categories = $this->database->allASC('category');
        $comments = $this->database->allASC('comments');
        $now = Carbon::now('Europe/Kiev');
        echo $this->view->render('home', compact('posts', 'featuredPosts', 'tags',
                                                'comments', 'now','categories', 'popularPosts','paginator'));
    }

    public function rules()
    {
        echo 'rules';
    }

}
<?php


namespace App\controllers;





use App\models\Post;
use Carbon\Carbon;
use JasonGrimes\Paginator;

class HomeController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        parent::__construct();

        $this->post = $post;
    }


    public function index()
    {
        $posts = $this->database->allDESC('posts');
        $totalItems = count($posts);
        $itemsPerPage = 8;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern = '/?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

        $posts = $this->database->getPaginated('posts', $currentPage, $itemsPerPage);
        $featuredPosts = $this->database->getFields('posts', '1' , 'is_featured', 8);
        $now = Carbon::now('Europe/Kiev');
        echo $this->view->render('home', compact('posts', 'featuredPosts', 'tags',
                                                        'now','categories', 'popularPosts','paginator'));
    }

    public function rules()
    {
        echo 'rules';
    }

    public function showAllCategories()
    {

        $posts = $this->post->getOnePostFromCategories('posts',  'category');
        $comments = $this->database->allASC('comments');
        $now = Carbon::now('Europe/Kiev');
        echo $this->view->render('post/category/index', compact('posts', 'featuredPosts',
            'comments', 'now','paginator'));
    }

}
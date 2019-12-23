<?php


namespace App\controllers;

use App\models\ImageManager;
use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use JasonGrimes\Paginator;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class PostController extends Controller
{
    private $slugify;
    private $manager;

    public function __construct(Slugify $slugify, ImageManager $manager)
    {
        parent::__construct();

        $this->slugify = $slugify;
        $this->manager = $manager;
    }

    public function showCategory($id)
    {
        $totalItems = $this->database->getCount('posts', 'category_id', $id);
        $itemsPerPage = 2;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern ='?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $category = $this->database->find('category', 'id', $id);
        $posts = $this->database->getPaginatedFrom('posts', 'category_id', $id,  $currentPage, $itemsPerPage);
        $comments = $this->database->allASC('comments');
        $now = Carbon::now('Europe/Kiev');
        echo $this->view->render('post/category/one_category', compact('posts',
            'comments', 'now','paginator','category'));
    }

    public function showOne($slug)
    {
        $post = $this->database->find('posts', 'slug', $slug);
        $totalItems = $this->database->getCount('comments', 'post_id', $post['id']);
        $itemsPerPage = 10;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern ='?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

        $comments = $this->database->getPaginatedFrom('comments', 'post_id',$post['id'],  $currentPage, $itemsPerPage);

        echo $this->view->render('post/showOne', compact('post', 'comments', 'paginator'));
    }
    public function showTag($id)
    {
        $totalItems = $this->database->getCount('post_tags', 'tag_id', $id);
        $itemsPerPage = 2;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern ='?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $postValues = $this->database->whereAll('post_tags', 'post_id', $id);
        $this->database->getAllPostsWithTags('posts', 'id', $postValues);
        $tag = $this->database->find('tags', 'id', $id);
        $posts = $this->database->getPaginated('postsT',  $currentPage, $itemsPerPage);
        $now = Carbon::now('Europe/Kiev');
        echo $this->view->render('post/one_tag', compact('posts',
            'comments', 'now','paginator', 'tag'));
    }

    public function showAllPostsFromAutor($id)
    {
        $totalItems = $this->database->getCount('posts', 'user_id', $id);
        $itemsPerPage = 2;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern ='?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $user = $this->database->find('users', 'id', $id);
        $posts = $this->database->getPaginatedFrom('posts', 'user_id', $id,  $currentPage, $itemsPerPage);
        $now = Carbon::now('Europe/Kiev');
        echo $this->view->render('post/all-posts-from-one-autor', compact('posts', 'now','paginator','user'));
    }

    public function showAllPostsFromDate($date)
    {
        $totalItems = $this->database->getCount('posts', 'created_at', $date);
        $itemsPerPage = 2;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern ='?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $posts = $this->database->getPaginatedFrom('posts', 'created_at', $date,  $currentPage, $itemsPerPage);
        $now = Carbon::now('Europe/Kiev');
        echo $this->view->render('post/all-posts-from-date', compact('posts', 'now','paginator','date'));
    }

    public function create()
    {
        $categories = $this->database->allASC('category');
        $tags = $this->database->allASC('tags');
        echo $this->view->render('/post/create', compact('categories', 'tags'));
    }

    public function store()
    {
        try{
            $file = $this->manager->verificationImage($_FILES['image']);
        }catch (\Exception $e)
        {
            flash()->error($e->getMessage());
            back();
            exit;
        }
        $tags = explode(',',rtrim($_POST['tag'], ','));
        foreach($tags as $tag)
        {
            if(!$this->database->find('tags', 'title', $tag))
            {
                $data = ['title' => $tag, 'slug' => $this->slugify->slugify($tag, '_'),];
                $this->database->store('tags', $data);
            }
        }
        if($file)
        {
            $description = acert($_POST['content'], 100);
            $postData = [
                'title' => $_POST['title'],
                'slug' => $this->slugify->slugify($description, '_'),
                'content' => $_POST['content'],
                'description' => $description,
                'category_id' => $_POST['category'],
                'created_at' => date('F d, Y', time()),
                'user_id'    => components(\Delight\Auth\Auth::class)->getUserId(),
                'image'      => $file
            ];
        }else{
            $description = acert($_POST['content'], 150);
            $postData = [
                'title' => $_POST['title'],
                'slug' => $this->slugify->slugify($description, '_'),
                'content' => $_POST['content'],
                'description' => $description,
                'category_id' => $_POST['category'],
                'created_at' => date('F d, Y', time()),
                'user_id'    => components(\Delight\Auth\Auth::class)->getUserId()
                ];
        }

        if($this->validate()) {


            try {
                $postId = $this->database->store('posts', $postData);

            } catch (\Exception $e) {
                flash()->error($e->getMessage());//'Операция не удалась. Пожалуйста попробуйте позже'
                back();
                exit;
            }
            $tagData = [];
            foreach ($tags as $tag) {
                $tagId = $this->database->find('tags', 'title', $tag);

                $tagData[] = [
                    'tag_id' => $tagId['id'],
                    'post_id' => $postId
                ];
            }
            $this->database->multiStore('post_tags', $tagData);
            $this->manager->add($_FILES['image'], 'post', $file);
            flash()->success('Запись Успешно добавлена');
            back();
            exit;

        }
    }

    private function validate()
    {
        $validator = v::key('title', v::stringType()->notEmpty())
            ->key('content', v::stringType()->notEmpty());

        try {
            return  $validator->assert($_POST);


        } catch (ValidationException $exception) {
            $exception->findMessages($this->getMessages());
            flash()->error($exception->getMessages());
            back();
            exit;
        }
    }

    private function getMessages()
    {
        return [
            'terms'   =>  'Вы должны согласится с правилами.',
            'username' => 'Введите имя',
            'email' => 'Неверный формат e-mail',
            'password'  =>  'Введите пароль',
            'password_confirmation' =>  'Пароли не сопадают'
        ];
    }
}
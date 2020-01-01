<?php


namespace App\controllers;

use App\models\ImageManager;
use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use Delight\Auth\Auth;
use JasonGrimes\Paginator;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;
use Faker\Factory;

class PostController extends Controller
{
    private $slugify;
    private $manager;
    private $auth;

    public function __construct(Slugify $slugify, ImageManager $manager, Auth $auth)
    {
        parent::__construct();

        $this->slugify = $slugify;
        $this->manager = $manager;
        $this->auth = $auth;
    }

    public function showCategory($id)
    {
        $totalItems = $this->database->getCount('posts', 'category_id', $id);
        $itemsPerPage = 8;
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
        $views = (int)$post['views'];
        $views += 1;
        $this->database->update('posts', ['views' => $views], 'id', $post['id']);
        $tagsId = $this->database->whereAll('post_tags', 'post_id', $post['id']);

        $tags = [];
        foreach ($tagsId as $tagId)
        {
            $tags[] = $this->database->find('tags', 'id', $tagId['tag_id']);
        }
        $totalItems = $this->database->getCount('comments', 'post_id', $post['id']);
        $itemsPerPage = 10;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern ='?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

        $comments = $this->database->getPaginatedFrom('comments', 'post_id',$post['id'],  $currentPage, $itemsPerPage);

        echo $this->view->render('post/showOne', compact('post', 'comments', 'paginator', 'tags'));
    }
    public function showTag($id)
    {
        $totalItems = $this->database->getCount('post_tags', 'tag_id', $id);
        $itemsPerPage = 8;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern ='?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $this->database->joinQuery('post_tags', 'posts', 'tag_id', $id, 'LEFT');

                $tag = $this->database->find('tags', 'id', $id);
                $posts = $this->database->getPaginated('post_with_tags', 'post_id',  $currentPage, $itemsPerPage);

                $now = Carbon::now('Europe/Kiev');
                if(!empty($posts))
                {
                    echo $this->view->render('post/one_tag', compact('posts',
                        'comments', 'now','paginator', 'tag'));
                }



        $tag = $this->database->find('tags', 'id', $id);
        echo $this->view->render('post/empty_tag', compact('tag'));

    }

    public function showAllPostsFromAutor($id)
    {
        $totalItems = $this->database->getCount('posts', 'user_id', $id);
        $itemsPerPage = 8;
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
        $itemsPerPage = 8;
        $currentPage = ($_GET['page'])?? 1;
        $urlPattern ='?page=(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $posts = $this->database->getPaginatedFrom('posts', 'created_at', $date,  $currentPage, $itemsPerPage);
        $post = $this->database->find('posts', 'created_at', $date);
        $now = Carbon::now('Europe/Kiev');
        echo $this->view->render('post/all-posts-from-date', compact('posts', 'now','paginator','date', 'post'));
    }

    public function create()
    {
        $categories = $this->database->allASC('category');
        $tags = $this->database->allASC('tags');
        echo $this->view->render('/post/create', compact('categories', 'tags'));
    }
    public function addXNotes()
    {
        $faker = Factory::create();
        $categories = $this->database->AllASC('category');
        $categoryId = [];
        foreach($categories as $category)
        {
            $categoryId[] = $category['id'];

        }
        $tags = $this->database->AllASC('tags');
        $tagTitle = [];
        foreach($tags as $tag)
        {
            $tagTitle[] = $tag['title'];

        }

        for($i = 0; $i < 1; $i++)
        {
            $description = $faker->words(50, true);
            $title = $faker->words(7, true);
            $image = $faker->imageUrl($width = 730, $height = 400);
            $file = uniqid().'.'.'jpg';
            $postData = [
                'title' => $title ,
                'slug' => $this->slugify->slugify($title, '_'),
                'content' => $faker->paragraphs(rand(5, 20), true),
                'description' => $description,
                'category_id' => $faker->randomElement($categoryId),
                'created_at' => date('F d, Y', time()),
                'user_id'    => components(\Delight\Auth\Auth::class)->getUserId(),
                'image'      => $file
                ];
            $tags = $faker->randomElements($tagTitle, rand(1,4));
            foreach($tags as $tag)
            {
                if(!$this->database->find('tags', 'title', $tag))
                {
                    $data = ['title' => $tag, 'slug' => $this->slugify->slugify($tag, '_'),];
                    $this->database->store('tags', $data);
                }
            }
                    $postId = $this->database->store('posts', $postData);
                    $categoryCount = $this->database->find('category', 'id', $postData['category_id'])['post_counter'];
                    $categoryCount += 1;
                    $categoryCounter = [
                      'post_counter' => $categoryCount
                    ];
                    $this->database->update('category', $categoryCounter, 'id', $postData['category_id'] );
                $tagData = [];
                foreach ($tags as $tag) {
                    $tagId = $this->database->find('tags', 'title', $tag)['id'];

                    $tagData[] = [
                        'tag_id' => $tagId,
                        'post_id' => $postId
                    ];
                }
                $this->database->multiStore('post_tags', $tagData);

                $this->manager->add($image, 'post', $file );
        }
        back();
        exit;
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
        $tags = explode(',', trim($_POST['tag'], ','));
        $tags = array_unique($tags);
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
                'slug' => $this->slugify->slugify($_POST['title'], '_'),
                'content' => $_POST['content'],
                'description' => $description,
                'category_id' => $_POST['category'],
                'created_at' => date('F d, Y', time()),
                'user_id'    => components(\Delight\Auth\Auth::class)->getUserId()
                ];
        }

        if($this->validatePost()) {


            try {
                $postId = $this->database->store('posts', $postData);

            } catch (\Exception $e) {
                flash()->error($e->getMessage());//'Операция не удалась. Пожалуйста попробуйте позже'
                back();
                exit;
            }
            $categoryCounter = (int)($this->database->find('category', 'id', $_POST['category'])['post_counter']);
            $categoryCounter += 1;
            $this->database->update('category', ['post_counter' => $categoryCounter], 'id', $_POST['category'] );
            $tagData = [];
            foreach ($tags as $tag) {
                $tagId = $this->database->find('tags', 'title', $tag)['id'];

                $tagData[] = [
                    'tag_id' => $tagId,
                    'post_id' => $postId
                ];
            }
            $this->database->multiStore('post_tags', $tagData);
            if($file)
            {
                $this->manager->add($_FILES['image'], 'post', $file);
            }

            flash()->success('Запись Успешно обновлена');
            back();
            exit;

        }
    }

    public function editPost($id)
    {
        $post = $this->database->find('posts', 'id', $id);
        $tagsValues = $this->database->whereAll('post_tags', 'post_id', $id );
        $values = [];
        foreach ($tagsValues as $tagsValue) {
            $values[] = $this->database->find('tags', 'id', $tagsValue['tag_id'])['title'];
        }

        $tags = implode(',', $values);
        $tags .= ',';
        echo $this->view->render('post/edit-post', compact('post', 'tags'));
    }
    public function updatePost($id)
    {
        try{
            $file = $this->manager->verificationImage($_FILES['image']);
        }catch (\Exception $e)
        {
            flash()->error($e->getMessage());
            back();
            exit;
        }

        if(!empty($_POST['tag']))
        {
            $tags = explode(',',trim($_POST['tag'], ','));
            $tags = array_unique($tags);
            foreach($tags as $tag)
            {
                if(!$this->database->find('tags', 'title', $tag))
                {
                    $data = ['title' => $tag, 'slug' => $this->slugify->slugify($tag, '_'),];
                    $this->database->store('tags', $data);
                }
            }
        }

        if($file)
        {
            $description = acert($_POST['content'], 100);
            $postData = [
                'title' => $_POST['title'],
                'slug' => $this->slugify->slugify($_POST['title'], '_'),
                'content' => $_POST['content'],
                'description' => $description,
                'category_id' => $_POST['category'],
                'updated_at' => date('F d, Y', time()),
                'image'      => $file
            ];
        }elseif(isset($_POST['deletePoster'])){
            $description = acert($_POST['content'], 150);
            $postData = [
                'title' => $_POST['title'],
                'slug' => $this->slugify->slugify($_POST['title'], '_'),
                'content' => $_POST['content'],
                'description' => $description,
                'category_id' => $_POST['category'],
                'updated_at' => date('F d, Y', time()),
                'image'      => ''
            ];
        }else{
            $description = acert($_POST['content'], 150);
            $postData = [
                'title' => $_POST['title'],
                'slug' => $this->slugify->slugify($_POST['title'], '_'),
                'content' => $_POST['content'],
                'description' => $description,
                'category_id' => $_POST['category'],
                'updated_at' => date('F d, Y', time()),
            ];
        }
        $post = $this->database->find('posts', 'id', $id);
        //if change category into post
        if($_POST['category'] != $post['category_id'] )
        {
            $catCounter = (int)$this->database->find('category', 'id', $post['category_id'])['post_counter'];
            $catCounter -= 1;
            $this->database->update('category',['post_counter' => $catCounter], 'id', $post['category_id']);

            $catCounter = (int)$this->database->find('category', 'id', $_POST['category'])['post_counter'];
            $catCounter += 1;
            $this->database->update('category',['post_counter' => $catCounter], 'id', $_POST['category']);
        }
        if($this->validatePost()) {


            try {
                $postId = $this->database->update('posts', $postData, 'id', $id);

            } catch (\Exception $e) {
                flash()->error($e->getMessage());//'Операция не удалась. Пожалуйста попробуйте позже'
                back();
                exit;
            }
            $tagData = [];
            $tagTitle = [];
            $tagsId = $this->database->whereAll('post_tags', 'post_id', $id);

            foreach ($tagsId as $item) {
                $tagTitle[] = $this->database->find('tags', 'id', $item['tag_id'])['title'];
            }

            $tags = array_merge($tagTitle, $tags);
            $tags = array_unique($tags);
            foreach ($tags as $tag)
            {
                $tagId = $this->database->find('tags', 'title', $tag)['id'];
                if(!$this->database->findWhereAndWhere('post_tags', 'tag_id', $tagId, 'post_id', $id))
                {
                    $tagData[] = [
                        'tag_id' => $tagId,
                        'post_id' => $id
                    ];
                }

            }
            if(!empty($tagData))
            {
                $this->database->multiStore('post_tags', $tagData);
            }

            if($file)
            {
                $this->manager->add($_FILES['image'], 'post', $file);
            }elseif(isset($_POST['deletePoster']))
            {
                $this->manager->delete('post', $post['image']);
            }

            flash()->success('Запись Успешно обновлена');
            back();
            exit;

        }
    }
    public function deletePost($id)
    {
        $post = $this->database->find('posts', 'id', $id);

        $catCounter = (int)$this->database->find('category', 'id', $post['category_id'])['post_counter'];
        if($catCounter > 0) $catCounter -= 1;
        $this->database->update('category',['post_counter' => $catCounter], 'id', $post['category_id']);
        $this->database->delete('posts', 'id', $id);
        $this->database->delete('post_tags', 'post_id', $id);
        $this->database->delete('comments', 'post_id', $id);

        if($post['image'] != '') $this->manager->delete('post', $post['image']);
        flash()->success('Запись Успешно удалена');
        back();
        exit;

    }

    public function addComment($id)
    {
        if($this->auth->isLoggedIn())
        {
            if($this->validateComment())
            {
                $data = [
                    'name' => $this->auth->getUsername(),
                    'text' => $_POST['text'],
                    'user_id' => $this->auth->getUserId(),
                    'post_id' => $id
            ];
                $this->database->store('comments',$data);
                flash()->success('Сообщение отправлено на модерацию. Оно скоро появиться');
                back();
                exit;
            }

        }else{
            if($this->validateComment())
            {
                $data = [
                    'name' => $_POST['name'],
                    'text' => $_POST['text'],
                    'post_id' => $id
                ];
                $this->database->store('comments',$data);
                flash()->success('Сообщение отправлено на модерацию. Оно скоро появиться');
                back();
                exit;
            }
        }
    }

    private function validatePost()
{
    $validator = v::key('title', v::stringType()->notEmpty())
        ->key('content', v::stringType()->notEmpty())
        ->key('category', v::stringType()->notEmpty());

    try {
        return  $validator->assert($_POST);


    } catch (ValidationException $exception) {
        $exception->findMessages($this->getMessages());
        flash()->error($exception->getMessages());
        back();
        exit;
    }
}
    private function validateComment()
    {
        $validator = v::key('text', v::stringType()->notEmpty());

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
            'title'   =>  'Описание не должно быть пустым',
            'content' => 'Статья не должна быть пустой',
            'category' => 'Выберите категорию',
            'text' => 'Сообщение не должно быть пустым'
        ];
    }
}
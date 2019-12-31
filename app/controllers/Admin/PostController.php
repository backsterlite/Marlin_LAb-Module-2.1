<?php


namespace App\controllers\Admin;


use App\models\ImageManager;
use Cocur\Slugify\Slugify;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class PostController extends Controller
{
    private $manager;
    private $slugify;
    public function __construct(ImageManager $manager, Slugify $slugify)
    {
        parent::__construct();
        $this->manager = $manager;
        $this->slugify = $slugify;
    }

    public function index()
    {

        $posts = $this->database->allDESC('posts');
        echo $this->view->render('Admin/posts/index', compact('posts'));
    }

    public function create()
    {
        echo $this->view->render('Admin/posts/create');
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
                'status'      => 1,
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
                'status'      => 1,
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

    public function  edit($id)
    {

        $post = $this->database->find('posts', 'id', $id);
        $tagsValues = $this->database->whereAll('post_tags', 'post_id', $id );
        $values = [];
        foreach ($tagsValues as $tagsValue) {
            $values[] = $this->database->find('tags', 'id', $tagsValue['tag_id'])['title'];
        }

        $tags = implode(',', $values);
        $tags .= ',';
        echo $this->view->render('Admin/posts/edit', compact('post', 'tags'));

    }

    public function update($id)
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
                'is_featured' => ($_POST['featured'] == 'on')? 1: 0,
                'status' => ($_POST['status'] == 'on')? 1: 0,
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
                'is_featured' => ($_POST['featured'] == 'on')? 1: 0,
                'status' => ($_POST['status'] == 'on')? 1: 0,
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
                'is_featured' => ($_POST['featured'] == 'on')? 1: 0,
                'status' => ($_POST['status'] == 'on')? 1: 0,
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
    public function delete($id)
    {
        $post = $this->database->find('posts', 'id', $id);

        $catCounter = (int)$this->database->find('category', 'id', $post['category_id'])['post_counter'];
        if($catCounter > 0)
        {
            $catCounter -= 1;
            $this->database->update('category',['post_counter' => $catCounter], 'id', $post['category_id']);
        }
        $this->database->delete('posts', 'id', $id);
        $this->database->delete('post_tags', 'post_id', $id);
        $this->database->delete('comments', 'post_id', $id);
        if($post['image'] != '') $this->manager->delete('post', $post['image']);
        flash()->success('Запись Успешно удалена');
        back();
        exit;

    }

    public function changeFeatured($id)
    {
        if($_GET['featured'] == '1')
        {
            $this->database->update('posts', ['is_featured' => 1], 'id', $id);
        }else if($_GET['featured'] == '0')
        {
            $this->database->update('posts', ['is_featured' => 0], 'id', $id);
        }
        flash()->success('Изменения приняты');
        back();
        exit;
    }
    public function changeStatus($id)
    {
        if($_GET['status'] == '1')
        {
            try{
                $this->database->update('posts', ['status' => 1], 'id', $id);
            }catch(\Exception $e)
            {
                flash()->error($e->getMessage());
                back();
                exit;
            }

        }else if($_GET['status'] == '0')
        {
            try{
                $this->database->update('posts', ['status' => 0], 'id', $id);
            }catch(\Exception $e)
            {
                flash()->error($e->getMessage());
                back();
                exit;
            }
        }
        flash()->success('Изменения приняты');
        back();
        exit;
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
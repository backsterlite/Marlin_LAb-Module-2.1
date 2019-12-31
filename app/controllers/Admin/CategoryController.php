<?php


namespace App\controllers\Admin;


use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class CategoryController extends Controller
{
    public function index()
    {
        echo $this->view->render('Admin/category/index');
    }

    public function create()
    {
        echo $this->view->render('Admin/category/create');
    }
    public function store()
    {
        if($this->validateCategory())
        {
            try
            {
                $this->database->store('category', ['title' => $_POST['title']]);
            }catch (\Exception $e)
            {
                flash()->error($e->getMessage());
                back();
                exit;
            }
            flash()->success('Категория добавлена');
            back();
            exit;
        }

    }
    public function edit($id)
    {
        $category = $this->database->find('category', 'id', $id);
        echo $this->view->render('Admin/category/edit', compact('category'));
    }
    public function update($id)
    {
        if($this->validateCategory())
        {
            if($id == '9')
            {
                flash()->error('Категория по умолчанию не изменяеться');
                back();
                exit;
            }

            try{
                $this->database->update('category', ['title' => $_POST['title']], 'id', $id);
            }catch (\Exception $e)
            {
                flash()->error($e->getMessage());
                back();
                exit;
            }
            flash()->success('Категория обновлена');
            back();
            exit;
        }

    }
    public function delete($id)
    {
        if($id == '9')
        {
            flash()->error('Категория по умолчанию не удаляется');
            back();
            exit;
        }
        $postFromCategory = $this->database->whereAll('posts', 'category_id', $id);
        $counter = $this->database->getCount('posts', 'category_id', '9');

        foreach ($postFromCategory as $post) {
            try{
                $this->database->update('posts', ['category_id' => 9 ], 'id',  $post['id']);
                $counter += 1;
            }catch (\Exception $e) {
                flash()->error($e->getMessage());
                back();
                exit;
            }
        }
        try{
            $this->database->update('category', ['post_counter' => $counter ], 'id',  '9');
        }catch (\Exception $e) {
            flash()->error($e->getMessage());
            back();
            exit;
        }



        $this->database->delete('category', 'id', $id);
        flash()->success('Категория удалена');
        back();
        exit;
    }
    private function validateCategory()
    {
        $validator = v::key('title', v::stringType()->notEmpty());

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
            'title'   =>  'Название  не должно быть пустым',
        ];
    }


}
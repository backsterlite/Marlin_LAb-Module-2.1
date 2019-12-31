<?php


namespace App\controllers\Admin;


use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class TagController extends Controller
{
    public function index()
    {
        echo $this->view->render('Admin/tags/index');
    }

    public function  create()
    {
        echo $this->view->render('Admin/tags/create');
    }

    public function store()
    {

        if($this->validateTag())
        {
            try
            {
                $this->database->store('tags', ['title' => $_POST['title']]);
            }catch (\Exception $e)
            {
                flash()->error($e->getMessage());
                back();
                exit;
            }
            flash()->success('Тег добавлен');
            back();
            exit;
        }
    }
    public function edit($id)
    {
        $tag = $this->database->find('tags', 'id', $id);
        echo $this->view->render('Admin/tags/edit', compact('tag'));

    }
    public function update($id)
    {
        if($this->validateTag())
        {

            try{
                $this->database->update('tags', ['title' => $_POST['title']], 'id', $id);
            }catch (\Exception $e)
            {
                flash()->error($e->getMessage());
                back();
                exit;
            }
            flash()->success('Тег обновлен');
            back();
            exit;
        }
    }
    public function delete($id)
    {
        $this->database->delete('post_tags', 'tag_id', $id);
        $this->database->delete('tags', 'id', $id);
        flash()->success('Тег удален');
        back();
        exit;

    }

    private function validateTag()
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
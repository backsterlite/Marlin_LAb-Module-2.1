<?php


namespace App\controllers;

class PostController extends Controller
{


    public function add()
    {
         include dirname(__DIR__) . '/View/add.php';
    }

    public function store()
    {
        $this->queryBuilder->store('comments', $_POST);
        flash()->success('Post create');
        header('Location:/');
        exit;
    }

    public function show($key)
    {
        $post =  $this->queryBuilder->show('comments',$key['id']);
        include dirname(__DIR__) . '/View/show.php';
    }

    public function edit($key)
    {
        $post =  $this->queryBuilder->show('comments',$key['id']);
        include dirname(__DIR__) . '/View/edit.php';
    }

    public function update( $key)
    {
        $this->queryBuilder->update('comments',$_POST, $key['id'] );
        flash()->success('Post update');
        header('Location:/');
        exit;
    }

    public function delete($key)
    {
        $this->queryBuilder->delete('comments', $key['id']);
        flash()->success('Post delete');
        header('Location:/');
        exit;
    }

}
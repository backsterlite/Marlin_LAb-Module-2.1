<?php


namespace App\controllers;

class PostController extends Controller
{


    public function add()
    {
         echo $this->view->render('add');
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
        echo $this->view->render('show', ['post' => $post]);
    }

    public function edit($key)
    {
        $post =  $this->queryBuilder->show('comments',$key['id']);
        echo $this->view->render('edit', ['post' => $post]);
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
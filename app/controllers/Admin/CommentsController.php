<?php


namespace App\controllers\Admin;


class CommentsController extends Controller
{
     public function index()
     {
         $comments = $this->database->allASC('comments');
         echo $this->view->render('Admin/comments/index', compact('comments'));
     }
    public function changeStatus($id)
    {
        if($_GET['status'] == '1')
        {
            try{
                $this->database->update('comments', ['status' => 1], 'id', $id);
            }catch(\Exception $e)
            {
                flash()->error($e->getMessage());
                back();
                exit;
            }

        }else if($_GET['status'] == '0')
        {
            try{
                $this->database->update('comments', ['status' => 0], 'id', $id);
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

}
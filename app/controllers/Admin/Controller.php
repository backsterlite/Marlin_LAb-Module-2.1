<?php


namespace App\controllers\Admin;
use App\controllers\Controller as MainController;



class Controller extends MainController
{
    protected $auth;
    public function __construct()
    {
        $this->auth = components(\Delight\Auth\Auth::class);
        parent::__construct();
        if(!$this->auth->hasAnyRole(\App\models\Role::ADMIN, \App\models\Role::MODERATOR ))
        {
            abort(404);
            exit;
        }
    }
}
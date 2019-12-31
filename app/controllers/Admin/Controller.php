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
        if(!$this->auth->hasRole(\App\models\Role::ADMIN))
        {
            abort(404);
            exit;
        }
    }
}
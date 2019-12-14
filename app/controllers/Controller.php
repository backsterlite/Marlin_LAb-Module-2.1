<?php


namespace App\controllers;


use App\models\Notifications;
use App\models\QueryBuilder;

use Delight\Auth\Auth;
use League\Plates\Engine;
use JasonGrimes\Paginator;

abstract class Controller
{
    protected $queryBuilder;
    protected $view;
    protected $auth;
//    protected $mailer;
    public function __construct()
    {
        $this->queryBuilder = components( QueryBuilder::class);
        $this->view =  components(Engine::class);
        $this->auth = components( Auth::class);
//        $this->mailer = $notifications;
    }

    protected function paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern)
    {
        return new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    }

}
<?php


namespace App\controllers;


use App\models\QueryBuilder;
use League\Plates\Engine;

abstract class Controller
{
    protected $queryBuilder;
    protected $view;
    public function __construct()
    {
        $this->queryBuilder = new QueryBuilder() ;
        $this->view = new Engine('../app/View');
    }

}
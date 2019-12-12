<?php


namespace App\controllers;


use App\models\QueryBuilder;

class Controller
{
    public function __construct()
    {
        $this->queryBuilder = new QueryBuilder() ;
    }

}
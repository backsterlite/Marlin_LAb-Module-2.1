<?php


namespace App\controllers;


use App\models\QueryBuilder;
use League\Plates\Engine;
use JasonGrimes\Paginator;

abstract class Controller
{
    protected $queryBuilder;
    protected $view;
    public function __construct(QueryBuilder $queryBuilder, Engine $view)
    {
        $this->queryBuilder = $queryBuilder;
        $this->view = $view;
    }

    protected function paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern)
    {
        return new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
    }

}
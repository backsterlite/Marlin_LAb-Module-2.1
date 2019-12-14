<?php

use Delight\Auth\Auth;

return [
    'database' => [
        'dbname' => 'markup',
        'host' => 'localhost',
        'charset' => 'utf8',
        'username' => 'root',
        'password' => '',
    ],
    [
        'baseDir' => 'ROOT'
    ],

    'Definitions' =>[
        PDO::class => function()
        {
            $config = config('database');
            return new \PDO("mysql:dbname={$config['dbname']};host={$config['host']};charset={$config['charset']}",
                "{$config['username']}", "{$config['password']}", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        },
        Delight\Auth\Auth::class => function($container)
        {
            return $auth = new Auth($container->get('PDO'));
        },
        \League\Plates\Engine::class => function()
        {
            return new \League\Plates\Engine('../app/View');
        },
        \Aura\SqlQuery\QueryFactory::class => function()
        {
            return new \Aura\SqlQuery\QueryFactory('mysql');
        }

    ],

    'view_path' => __DIR__ . '/app/View/'

];

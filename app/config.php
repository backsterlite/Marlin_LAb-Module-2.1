<?php

return[
  'definitions' =>[
        \PDO::class => function()
        {
            $config = config('database');
            return new \PDO("{$config['driver']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}",
                                    "{$config['userName']}", "{$config['password']}",
                                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        },
      \Aura\SqlQuery\QueryFactory::class => function()
      {
          $config = config('database');
          return new \Aura\SqlQuery\QueryFactory($config['driver']);
      },
      \League\Plates\Engine::class => function()
      {
          return new \League\Plates\Engine(config('view_path'));
      },

      \Delight\Auth\Auth::class => function($container)
      {
          return new Delight\Auth\Auth($container->get('PDO'));
      }
  ],
    'database' =>[
        'driver'   => 'mysql',
        'host'     => 'localhost',
        'dbname'   => 'Blog',
        'charset'  => 'utf8',
        'userName' => 'root',
        'password' => ''
    ],
    'view_path' => __DIR__ .'/views',

    'Mail' =>[
        'Admin' =>[
            'name' => 'Admin',
            'email' => 'Admin@backsterSite.com'
        ]
    ],
    'uploadsFolder' =>[
        'user' => ['/public/assets/img/user/','/public/assets/img/user/no-user.jpg'],
        'post' => ['/public/assets/img/post/','/public/assets/img/post/no-post.jpg']




    ]
];
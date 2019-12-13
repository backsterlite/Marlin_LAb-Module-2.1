<?php

use Illuminate\Support\Arr;

function dd ($item, $key = 1)
{
    echo '<pre>';
    var_dump($item);
    echo '</pre>';
    if($key == 1)
    {
        die;
    }
}

function config( $path)
{
    global $config;
    return Arr::get($config, $path);
}

function back()
{
    header('Location:' . $_SERVER['HTTP_REFERER']);
    exit;
}
function redirect(string $path)
{
    header('Location:' . $path);
}

function auth()
{
    return (new Delight\Auth\Auth(App\models\Connection::make(config('database'))));
}

function paginator($paginator)
{
    include config('view_path') . 'patritions/paginate.php';
}


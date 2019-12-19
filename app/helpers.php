<?php

function config(string $path)
{
    $config = require __DIR__ . '/config.php';
    return $config[$path];
}
function components($name)
{
    global $container;
    return $container->get($name);

}
function getAllCategories()
{
    global $container;
    $factory = $container->get(\App\models\Database::class);
    return $factory->allASC('category');
}
function getUser($id)
{
    global $container;
    $factory = $container->get(\App\models\Database::class);
    return $factory->find('users', 'id', $id);
}
function diffDates($base, $now)
{
    $base = explode(',', $base);
    foreach($base as $k => $v)
    {
        $base[$k] = (int) $v;
    }

    $base= \Carbon\Carbon::create($base[0],$base[1],$base[2],$base[3],$base[4],$base[5], 'Europe/Kiev');
    $res = $base->diff($now);
    if($res->d > 0)
    {
        if($res->d == 1)
        {
            return $res->d . ' day ago';
        }else{
            return $res->d . ' days ago';
        }

    }elseif($res->h > 0)
    {
        if($res->h == 1)
        {
            return $res->h . ' hour ago';
        }else{
            return $res->h . ' hours ago';
        }
    }elseif($res->i > 0)
    {
        if($res->i == 1)
        {
            return $res->i . ' minute ago';
        }else{
            return $res->i . ' minutes ago';
        }
    }elseif($res->s > 0)
    {
        if($res->s == 1)
        {
            return $res->s . ' second ago';
        }else{
            return $res->s . ' seconds ago';
        }
    }else{
        return 'now';
    }

}
function back()
{
    header('Location:' . $_SERVER['HTTP_REFERER']);
}
function redirect($path)
{
    header('Location:' .$path);
}
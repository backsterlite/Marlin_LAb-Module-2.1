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
function getPopularPosts()
{
    global $container;
    $factory = $container->get(\App\models\Database::class);
    return $factory->allDESC('posts', 'views', 3);
}

function getTags()
{
    global $container;
    $factory = $container->get(\App\models\Database::class);
    return $factory->allDESC('tags', 'post_counter', 15);
}
function getCategory($id)
{
    global $container;
    $factory = $container->get(\App\models\Database::class);
    return $factory->find('category', 'id', $id);
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

function commentsCount(  $post_id)
{
    global $container;
     $db = $container->get(\App\models\Database::class);
     $res  = $db->getCount('comments','post_id',  $post_id);
    return $res;

}

function acert($name, $width)
{
    if(strlen($name) >= $width)
    {
       return mb_strimwidth($name, 0, $width, '...');
    }
    return $name;
}
function getImage($folder, $file)
{
    global $container;
    $manager = $container->get(\App\models\ImageManager::class);
    return $manager->getImage($folder, $file);
}
function getPostTags($post_id)
{
    global $container;
    $factory = $container->get(\App\models\Database::class);
    $tags =  $factory->whereAll('post_tags', 'post_id', $post_id);
    $tagsArray = [];
    foreach ($tags as $tag)
    {
        $tagsArray[] = $factory->find('tags', 'id', $tag['tag_id']);
    }
    return $tagsArray;
}

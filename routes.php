<?php

$routes = [
    "/" => "/View/home",
    "/add" => "/View/add",
    "/store" => "/store",
    "/update" => "/update"
];
if(isset($_GET["id"]))
{
    unset($routes);
    $routes = [
        "/show?id={$_GET["id"]}" => "/View/show",
        "/edit?id={$_GET["id"]}" => "/View/edit",
        "/delete?id={$_GET["id"]}" => "/delete",
        "/update/?id={$_GET["id"]}" => "/update"

    ];
}

if(array_key_exists($_SERVER["REQUEST_URI"], $routes))
{
    $key = $routes[$_SERVER["REQUEST_URI"]];
   return $key;
}else{
    return dd(404);
}
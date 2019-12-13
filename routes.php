<?php

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\controllers\HomeController', 'index']);

    $r->addRoute('GET', '/post/add', ['App\controllers\PostController', 'add']);
    $r->addRoute('GET', '/post/add/{id:\d+}', ['App\controllers\PostController', 'add_30']);
    $r->addRoute('POST', '/post/store', ['App\controllers\PostController', 'store']);
    $r->addRoute('GET', '/post/show/{id:\d+}', ['App\controllers\PostController', 'show']);
    $r->addRoute('GET', '/post/edit/{id:\d+}', ['App\controllers\PostController', 'edit']);
    $r->addRoute('GET', '/post/delete/{id:\d+}', ['App\controllers\PostController', 'delete']);
    $r->addRoute('POST', '/post/update/{id:\d+}', ['App\controllers\PostController', 'update']);

    $r->addRoute('GET', '/user/register', ['App\controllers\UserController', 'showRegisterForm']);
    $r->addRoute('POST', '/user/signup', ['App\controllers\UserController', 'signUp']);
    $r->addRoute('GET', '/user/login', ['App\controllers\UserController', 'showLoginForm']);
    $r->addRoute('POST', '/user/signin', ['App\controllers\UserController', 'signIn']);
    $r->addRoute('GET', '/user/logout', ['App\controllers\UserController', 'logOut']);

    $r->addRoute('GET', '/user/email_verification', ['App\controllers\VerificationController', 'emailVerification']);
    // The /{title} suffix is optional
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        (new \App\controllers\ErrorsController())->error404();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        (new \App\controllers\ErrorsController())->error405();
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $controller = new $handler[0];
        call_user_func([$controller, $handler[1]], $vars);
        // ... call $handler with $vars
        break;
}
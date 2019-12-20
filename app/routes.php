<?php

$builder = new DI\ContainerBuilder();
$builder->addDefinitions(config('definitions'));
$container = $builder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->get( '/', ['App\controllers\HomeController', 'index']);
    $r->get( '/terms', ['App\controllers\HomeController', 'rules']);
    $r->get( '/category', ['App\controllers\HomeController', 'showAllCategories']);

    $r->get( '/user/login', ['App\controllers\UserController', 'login']);
    $r->post( '/user/signin', ['App\controllers\UserController', 'signIn']);
    $r->get( '/user/logout', ['App\controllers\UserController', 'logout']);
    $r->get( '/user/register', ['App\controllers\UserController', 'register']);
    $r->post( '/user/signup', ['App\controllers\UserController', 'signUp']);

    $r->get( '/user/email_verification', ['App\controllers\UserController', 'emailVerification']);
    $r->get( '/user/forgot_password', ['App\controllers\UserController', 'showForgotPasswordForm']);
    $r->post(  '/user/forgot_password', ['App\controllers\UserController', 'forgotPasswordInitiatingRequest']);
    $r->get(  '/user/reset_password', ['App\controllers\UserController', 'canResetPassword']);
    $r->post(  '/user/change_password', ['App\controllers\UserController', 'changePassword']);

    $r->get(  '/user/resend_email', ['App\controllers\UserController', 'resendEmailMessage']);

    $r->get( '/category/{id:\d+}', ['App\controllers\PostController', 'showCategory']);

    // {id} must be a number (\d+)
    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
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
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($handler, $vars);
        // ... call $handler with $vars
        break;
}
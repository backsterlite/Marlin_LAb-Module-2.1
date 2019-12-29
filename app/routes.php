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
    $r->get( '/user/profile/id/{id:\d+}', ['App\controllers\UserController', 'showProfile']);
    $r->post( '/user/profile/id/{id:\d+}/edit/info', ['App\controllers\UserController', 'editProfileInfo']);
    $r->get( '/user/profile/{id:\d+}/edit/security', ['App\controllers\UserController', 'editProfileSecurity']);

    $r->get( '/category/{id:\d+}', ['App\controllers\PostController', 'showCategory']);

    $r->get( '/post/slug/{slug}', ['App\controllers\PostController', 'showOne']);
    $r->post( '/post/comment/send/id/{id:\d+}', ['App\controllers\PostController', 'addComment']);
    $r->get( '/post/id/{id:\d+}/edit', ['App\controllers\PostController', 'editPost']);
    $r->post( '/post/id/{id:\d+}/update', ['App\controllers\PostController', 'updatePost']);
    $r->get( '/post/id/{id:\d+}/delete', ['App\controllers\PostController', 'deletePost']);
    $r->get( '/post/user/id/{id:\d+}', ['App\controllers\PostController', 'showAllPostsFromAutor']);
    $r->get( '/post/date/{date}', ['App\controllers\PostController', 'showAllPostsFromDate']);
    $r->get( '/post/create', ['App\controllers\PostController', 'create']);
    $r->get( '/post/add', ['App\controllers\PostController', 'addXNotes']);
    $r->post( '/post/store', ['App\controllers\PostController', 'store']);
    $r->get( '/post/tag/{id:\d+}', ['App\controllers\PostController', 'showTag']);

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
        $container->call(['\App\controllers\ErrorsController', 'error404']);
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        $container->call(['\App\controllers\ErrorsController', 'error405']);
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($handler, $vars);
        break;
}
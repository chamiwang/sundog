<?php

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/index/{id:\d+}', 'Data@index');
    $r->addRoute('GET', '/test', 'Test@twig');
    $r->addGroup('/agrinews', function (FastRoute\RouteCollector $r) {
        $r->addRoute('GET', '/tags', 'Data@tags');
        $r->addRoute('GET', '/articles/{tag_id:\d+}/{offset:\d+}/{limit:\d+}', 'Data@articles');
        $r->addRoute('GET', '/detail/{id:\d+}', 'Data@detail');
        $r->addRoute('POST', '/addMessage', 'Data@addMessage');
    });
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
        // ... call $handler with $vars
        $handler_arr = explode('@', $handler);
        $controller_name = 'App\\Controller\\'.$handler_arr[0].'Controller';

        $controller = new $controller_name();
        $action = $handler_arr[1];
        $controller->$action($vars);

        break;
}
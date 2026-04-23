<?php

require __DIR__ . '/../db/DB.php';
require __DIR__ . '/../src/models/Customer.php';
require __DIR__ . '/../src/models/Order.php';
require __DIR__ . '/../src/controllers/HomeController.php';
require __DIR__ . '/../src/controllers/CustomerController.php';
require __DIR__ . '/../src/controllers/OrderController.php';

DB::connect();

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method     = $_SERVER['REQUEST_METHOD'];
$segments   = explode('/', trim($requestUri, '/'));

match(true) {
    $requestUri === '/'                                                                                                    => HomeController::index(),
    $requestUri === '/customers'        && $method === 'GET'                                                               => CustomerController::index(),
    $requestUri === '/customers/create' && $method === 'GET'                                                               => CustomerController::create(),
    $requestUri === '/customers'        && $method === 'POST'                                                              => CustomerController::store(),
    $segments[0] === 'customers' && isset($segments[1], $segments[2]) && $segments[2] === 'delete' && $method === 'POST'  => CustomerController::delete((int)$segments[1]),
    $requestUri === '/orders'           && $method === 'GET'                                                               => OrderController::index(),
    $requestUri === '/orders/create'    && $method === 'GET'                                                               => OrderController::create(),
    $requestUri === '/orders'           && $method === 'POST'                                                              => OrderController::store(),
    $segments[0] === 'orders' && isset($segments[1], $segments[2]) && $segments[2] === 'delete' && $method === 'POST'     => OrderController::delete((int)$segments[1]),
    default                                                                                                                => (function() { http_response_code(404); echo '<h1>404 – Lapa nav atrasta</h1>'; })()
};
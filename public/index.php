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

if (rtrim($requestUri, '/') === '') {
    HomeController::index();
} elseif (rtrim($requestUri, '/') === '/customers') {
    CustomerController::index();
} elseif ($requestUri === '/orders/create' && $method === 'GET') {
    OrderController::create();
} elseif (rtrim($requestUri, '/') === '/orders' && $method === 'POST') {
    OrderController::store();
} elseif (rtrim($requestUri, '/') === '/orders') {
    OrderController::index();
} else {
    http_response_code(404);
    echo '<h1>404 – Lapa nav atrasta</h1>';
}
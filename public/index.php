<?php

require __DIR__ . '/../db/DB.php';
require __DIR__ . '/../src/controllers/CustomerController.php';

DB::connect();

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (rtrim($requestUri, '/') === '/customers') {
    CustomerController::index();
} else {
    http_response_code(404);
    echo '<h1>404 – Lapa nav atrasta</h1>';
}
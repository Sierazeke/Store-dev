<?php

class CustomerController
{
    public static function index(): void
    {
        $withOrders = isset($_GET['with-orders']) && $_GET['with-orders'] === 'full';
        $customers  = $withOrders ? Customer::getAllWithOrders() : Customer::getAll();
        require __DIR__ . '/../views/customers.php';
    }

    public static function create(): void
    {
        require __DIR__ . '/../views/customers_create.php';
    }

    public static function store(): void
    {
        Customer::create($_POST);
        header('Location: /customers');
        exit;
    }
}
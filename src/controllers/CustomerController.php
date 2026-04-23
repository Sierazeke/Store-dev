<?php

class CustomerController
{
    public static function index(): void
    {
        $withOrders = isset($_GET['with-orders']) && $_GET['with-orders'] === 'full';

        $customers = $withOrders
            ? Customer::getAllWithOrders()
            : Customer::getAll();

        require __DIR__ . '/../views/customers.php';
    }
}
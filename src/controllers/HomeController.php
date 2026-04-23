<?php

class HomeController
{
    public static function index(): void
    {
        $customerCount  = Customer::getCount();
        $orderCount     = Order::getCount();
        $ordersByStatus = Order::getCountByStatus();

        require __DIR__ . '/../views/home.php';
    }
}
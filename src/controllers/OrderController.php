<?php

class OrderController
{
    public static function index(): void
    {
        $status = $_GET['status'] ?? null;

        $orders = $status
            ? Order::getByStatus($status)
            : Order::getAll();

        require __DIR__ . '/../views/orders.php';
    }
}
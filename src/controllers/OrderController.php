<?php

class OrderController
{
    public static function index(): void
    {
        $status = $_GET['status'] ?? null;
        $orders = $status ? Order::getByStatus($status) : Order::getAll();
        require __DIR__ . '/../views/orders.php';
    }

    public static function create(): void
    {
        $customers = Customer::getAll();
        require __DIR__ . '/../views/orders_create.php';
    }

    public static function store(): void
    {
        Order::create($_POST);
        header('Location: /orders');
        exit;
    }

    public static function delete(int $id): void
    {
        Order::delete($id);
        header('Location: /orders');
        exit;
    }
}
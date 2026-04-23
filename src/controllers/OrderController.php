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

    public static function create(): void
    {
        $customers = Customer::getAll();
        require __DIR__ . '/../views/orders_create.php';
    }

    public static function store(): void
    {
        Order::create([
            'customer_id'   => $_POST['customer_id'],
            'order_date'    => $_POST['order_date'],
            'status'        => $_POST['status'],
            'comment'       => $_POST['comment'],
            'delivery_date' => $_POST['delivery_date'],
        ]);

        header('Location: /orders');
        exit;
    }
}
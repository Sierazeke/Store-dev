<?php

class Order
{
    public static function getAll(): array
    {
        return DB::query('SELECT * FROM orders');
    }

    public static function getByStatus(string $status): array
    {
        return DB::queryWithParams(
            'SELECT * FROM orders WHERE status = ?',
            [$status]
        );
    }

    public static function getCount(): int
    {
        $result = DB::query('SELECT COUNT(*) as count FROM orders');
        return (int) $result[0]['count'];
    }

    public static function getCountByStatus(): array
    {
        return DB::query('SELECT status, COUNT(*) as count FROM orders GROUP BY status');
    }

    public static function create(array $data): void
    {
        DB::execute(
            'INSERT INTO orders (customer_id, order_date, status, comment, delivery_date) VALUES (?, ?, ?, ?, ?)',
            [
                $data['customer_id'],
                $data['order_date'],
                $data['status'],
                $data['comment'] ?: null,
                $data['delivery_date'] ?: null,
            ]
        );
    }
}
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
}
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
}
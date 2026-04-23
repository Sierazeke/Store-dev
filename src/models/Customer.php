<?php

class Customer
{
    public static function getAll(): array
    {
        return DB::query('SELECT * FROM customers');
    }

    public static function getAllWithOrders(): array
    {
        $customers = self::getAll();
        foreach ($customers as &$customer) {
            $customer['orders'] = DB::queryWithParams(
                'SELECT * FROM orders WHERE customer_id = ?',
                [$customer['customer_id']]
            );
        }
        return $customers;
    }
    
    public static function getCount(): int
    {
    $result = DB::query('SELECT COUNT(*) as count FROM customers');
    return (int) $result[0]['count'];
    }
}
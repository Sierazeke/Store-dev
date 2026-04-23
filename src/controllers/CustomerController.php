<?php

class CustomerController
{
    public static function index(): void
    {
        $withOrders = isset($_GET['with-orders']) && $_GET['with-orders'] === 'full';

        if ($withOrders) {
            $customers = DB::query('SELECT * FROM customers');
            foreach ($customers as &$customer) {
                $customer['orders'] = DB::queryWithParams(
                    'SELECT * FROM orders WHERE customer_id = ?',
                    [$customer['customer_id']]
                );
            }
        } else {
            $customers = DB::query('SELECT * FROM customers');
        }

        require __DIR__ . '/../views/customers.php';
    }
}
<?php

class CustomerController
{
    public static function index(): void
    {
        $customers = DB::query('SELECT * FROM customers');
        require __DIR__ . '/../views/customers.php';
    }
}
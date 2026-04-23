<?php

class Order
{
    public static function getAll(): array
    {
        return DB::query('SELECT * FROM orders');
    }
}
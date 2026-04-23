<?php

class Order
{
    public int     $order_id;
    public int     $customer_id;
    public string  $order_date;
    public string  $status;
    public ?string $comment;
    public ?string $delivery_date;

    public function __construct(array $row)
    {
        $this->order_id      = $row['order_id'];
        $this->customer_id   = $row['customer_id'];
        $this->order_date    = $row['order_date'];
        $this->status        = $row['status'];
        $this->comment       = $row['comment'];
        $this->delivery_date = $row['delivery_date'];
    }

    public static function getAll(): array
    {
        $rows = DB::query('SELECT * FROM orders');
        return array_map(fn($row) => new self($row), $rows);
    }

    public static function getByStatus(string $status): array
    {
        $rows = DB::queryWithParams('SELECT * FROM orders WHERE status = ?', [$status]);
        return array_map(fn($row) => new self($row), $rows);
    }

    public static function getByCustomerId(int $customerId): array
    {
        $rows = DB::queryWithParams('SELECT * FROM orders WHERE customer_id = ?', [$customerId]);
        return array_map(fn($row) => new self($row), $rows);
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
<?php

class Customer
{
    public int    $customer_id;
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $birth_date;
    public int    $points;
    public array  $orders = [];

    public function __construct(array $row)
    {
        $this->customer_id = $row['customer_id'];
        $this->first_name  = $row['first_name'];
        $this->last_name   = $row['last_name'];
        $this->email       = $row['email'];
        $this->birth_date  = $row['birth_date'];
        $this->points      = $row['points'];
    }

    public static function getAll(): array
    {
        $rows = DB::query('SELECT * FROM customers');
        return array_map(fn($row) => new self($row), $rows);
    }

    public static function getAllWithOrders(): array
    {
        $customers = self::getAll();
        foreach ($customers as $customer) {
            $customer->orders = Order::getByCustomerId($customer->customer_id);
        }
        return $customers;
    }

    public static function getCount(): int
    {
        $result = DB::query('SELECT COUNT(*) as count FROM customers');
        return (int) $result[0]['count'];
    }
    public static function create(array $data): void
    {
        DB::execute(
            'INSERT INTO customers (first_name, last_name, email, birth_date, points) VALUES (?, ?, ?, ?, ?)',
            [$data['first_name'], $data['last_name'], $data['email'], $data['birth_date'], $data['points'] ?? 0]
        );
    }
    public static function delete(int $id): void
    {
        DB::execute('DELETE FROM orders WHERE customer_id = ?', [$id]);
        DB::execute('DELETE FROM customers WHERE customer_id = ?', [$id]);
    }
}
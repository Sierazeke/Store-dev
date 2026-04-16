<?php

class DB
{
    private static PDO $pdo;

    public static function connect(): void
    {
        $host = '172.22.144.1';
        $db   = 'store_dev';
        $user = 'store_app';
        $pass = 'password';

        self::$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function query(string $sqlQuery): array
    {
        $stmt = self::$pdo->query($sqlQuery);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
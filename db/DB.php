<?php

class DB
{
    private static PDO $pdo;

    public static function connect(): void
    {
        $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            [$key, $value] = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }

        self::$pdo = new PDO(
            "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4",
            $_ENV['DB_USER'],
            $_ENV['DB_PASS']
        );
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function query(string $sqlQuery): array
    {
        $stmt = self::$pdo->query($sqlQuery);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function queryWithParams(string $sqlQuery, array $params): array
{
    $stmt = self::$pdo->prepare($sqlQuery);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
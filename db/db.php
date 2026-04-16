<?php

$host = '172.22.144.1';
$db   = 'store_dev';
$user = 'store_app';
$pass = 'password';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
<?php
$host = 'localhost:3306';
$db = 'u0704313_clinic';
$charset = 'utf8';

$user = 'u0704_clinic';
$pass = 'bqpY3~31';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = array (
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
);

$pdo = new PDO ($dsn, $user, $pass, $opt);
?>
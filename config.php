<?php
$host = 'localhost:3306';
$db = 'u0704313_main';
$charset = 'utf8';

$user = 'u0704_user';
$pass = 'warnyw-3zemky-mithAb';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = array (
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
);

$pdo = new PDO ($dsn, $user, $pass, $opt);

$_SERVER['DOCUMENT_ROOT'] = '/var/www/vhosts/u0704313.plsk.regruhosting.ru/httpdocs/museshare.site/uploads/';
?>
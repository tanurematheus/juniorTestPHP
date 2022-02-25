<?php

include_once "db.php";

$database   = 'mysql';
$host       = '127.0.0.1';
$dbname = 'products';
$port       = 3306;
$user       = 'root';
$password   = '';

$connection = new db($database, $host, $dbname, $port, $user, $password);

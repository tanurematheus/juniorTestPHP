<?php

include_once "connection.php";
include_once "../class/dvd.php";
include_once "../class/furniture.php";
include_once "../class/book.php";

try {
    $productInfo = new $_POST['productType'];
    $info = $productInfo->insertDB();
    $connection->insert($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['productType'], $info);
} catch (Exception $e) {
}


header('location:../index.php');

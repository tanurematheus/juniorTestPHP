<?php

include_once "connection.php";


$products_to_delete = $_POST['delete_checkbox'];
foreach ($products_to_delete as $delete_checkbox) {
    $connection->delete($delete_checkbox);
}

header('location:../index.php');

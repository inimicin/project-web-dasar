<?php

include('../script/produk.php');

session_start();

if (!(session_status() == PHP_SESSION_ACTIVE && session_id() == "admin")) {
    header("location: ../index.php");
}

$result = delete_data_produk($_GET['id']);

if($result) {
    header('location: ./produk_data.php');
}

?>
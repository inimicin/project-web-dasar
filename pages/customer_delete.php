<?php

include('../script/customer.php');

session_start();

if (!(session_status() == PHP_SESSION_ACTIVE && session_id() == "admin")) {
    header("location: ../index.php");
}

$result = delete_data_customer($_GET['id']);

if($result) {
    header('location: ./customer_data.php');
}

?>
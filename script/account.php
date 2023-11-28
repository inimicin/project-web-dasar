<?php
include('koneksi.php');

function auth($username, $rawPassword) {
  $query = "SELECT * FROM `account` where `username`='$username';";
  $sql = mysqli_query($GLOBALS['conn'], $query);
  $result = mysqli_fetch_row($sql);

  return password_verify($rawPassword, $result[2]);
}

?>
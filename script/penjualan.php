<?php

include('customer.php');
include('produk.php');

function get_data_penjualan() {
  $query = "SELECT * FROM `penjualan`";
  $sql = mysqli_query($GLOBALS['conn'], $query);

  return mysqli_fetch_all($sql);
}

function get_data_penjualan_by_produk($id) {
  $query = "SELECT * FROM `penjualan` WHERE `produk`=$id";
  $sql = mysqli_query($GLOBALS['conn'], $query);

  return mysqli_fetch_all($sql);
}

function get_data_penjualan_by_customer($id) {
  $query = "SELECT * FROM `penjualan` WHERE `customer`=$id";
  $sql = mysqli_query($GLOBALS['conn'], $query);

  return mysqli_fetch_all($sql);
}

function save_data_penjualan($produk, $jumlah, $nama_depan, $nama_belakang, $email, $telepon, $alamat) {
  $currProduk = get_data_produk_by_id($produk);

  if(get_data_customer_by_email($email) === NULL) {
    $result = mysqli_query($GLOBALS['conn'], "INSERT INTO `customer`(`id_customer`, `nama_depan`, `nama_belakang`, `email`, `no_telepon`, `alamat`) VALUES (NULL,'$nama_depan','$nama_belakang','$email','+62$telepon','$alamat');");

    if($result) {
        
    }else{
        return false;
    }
  }

  if($jumlah > $currProduk[3]) {
    return false;
  }

  $result = mysqli_query($GLOBALS['conn'], "INSERT INTO `penjualan`(`id`, `tanggal`, `produk`, `customer`, `jumlah`) VALUES (NULL,'".date("Y-m-d")."','$produk','".get_data_customer_by_email($email)[0]."','$jumlah');");

  if($result) {
    $result = update_data_produk($currProduk[0], $currProduk[1], $currProduk[2], $currProduk[3] - $jumlah);
    
    if($result){
      return true;
    }
  }

  return false;
}

?>
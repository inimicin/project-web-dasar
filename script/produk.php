<?php

include('koneksi.php');

function get_data_produk() {
    $query = "SELECT * FROM `produk`";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return mysqli_fetch_all($sql);
}

function get_data_produk_by_id($id) {
    $query = "SELECT * FROM `produk` where `id_produk`=$id;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return mysqli_fetch_row($sql);
}

function save_data_produk($nama, $harga, $stok) {
    $result = mysqli_query($GLOBALS['conn'], "INSERT INTO `produk`(`id_produk`, `nama_produk`, `harga_produk`, `stok`) VALUES (NULL,'$nama','$harga', '$stok');");

    if($result) {
        return true;
    }else{
        return false;
    }
}

function update_data_produk($id, $nama, $harga, $stok) {
    $result = mysqli_query($GLOBALS['conn'], "UPDATE `produk` SET `nama_produk`='$nama',`harga_produk`='$harga',`stok`='$stok' WHERE `id_produk`='$id';");

    if($result) {
        return true;
    }else{
        return false;
    }
}

function delete_data_produk($id) {
    $result = mysqli_query($GLOBALS['conn'], "DELETE FROM `produk` WHERE `id_produk`='$id';");

    if($result) {
        return true;
    }else{
        return false;
    }
}

?>
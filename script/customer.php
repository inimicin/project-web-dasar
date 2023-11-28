<?php
include('koneksi.php');

function get_data_customer() {
    $query = "SELECT * FROM `customer`";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return mysqli_fetch_all($sql);
}

function get_data_customer_by_id($id) {
    $query = "SELECT * FROM `customer` WHERE `id_customer`=$id";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return mysqli_fetch_row($sql);
}

function get_data_customer_by_email($email) {
    $query = "SELECT * FROM `customer` WHERE `email`='$email'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return mysqli_fetch_row($sql);
}

function save_data_customer($nama_depan, $nama_belakang, $email, $telepon, $alamat) {
    $result = mysqli_query($GLOBALS['conn'], "INSERT INTO `customer`(`id_customer`, `nama_depan`, `nama_belakang`, `email`, `no_telepon`, `alamat`) VALUES (NULL,'$nama_depan','$nama_belakang','$email','+62$telepon','$alamat');");

    if($result) {
        return true;
    }else{
        return false;
    }
}

function update_data_customer($id, $nama_depan, $nama_belakang, $email, $telepon, $alamat) {
    $result = mysqli_query($GLOBALS['conn'], "UPDATE `customer` SET `nama_depan`='$nama_depan',`nama_belakang`='$nama_belakang',`email`='$email',`no_telepon`='+62$telepon',`alamat`='$alamat' WHERE `id_customer`='$id';");

    if($result) {
        return true;
    }else{
        return false;
    }
}

function delete_data_customer($id) {
    $result = mysqli_query($GLOBALS['conn'], "DELETE FROM `customer` WHERE `id_customer`='$id';");

    if($result) {
        return true;
    }else{
        return false;
    }
}
?>
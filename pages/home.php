<?php

include('../script/penjualan.php');

session_start();

if (!(session_status() == PHP_SESSION_ACTIVE && session_id() == "admin")) {
    header("location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/general.css">
    <link rel="stylesheet" href="../style/component.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../script/Header.js"></script>
    <script src="https://kit.fontawesome.com/eff27b1688.js" crossorigin="anonymous"></script>
</head>

<body>
    <main-header active="home"></main-header>
    <div class="container-fluid w-100 p-0">
        <div class="container" style="width: fit-content;margin-bottom: 100px !important;">
            <ul class="p-0">
                <li>
                    <h2 style="color: white;font-weight: bold;position: absolute;margin-top: 130px;transform: translate(-50%, 0);">Selamat Datang!</h2>
                </li>
            </ul>
            <div class="row w-75" style="position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="col-4 mb-3 mb-sm-0">
                    <div class="card" style="width: 300px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #0da4e3">Jumlah Produk</h5>
                            <p class="card-text"><?= count(get_data_produk()) ?> Produk</p>
                            <a href="./produk_data.php" class="btn btn-primary">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 300px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #0da4e3">Jumlah Customer</h5>
                            <p class="card-text"><?= count(get_data_customer()) ?> Orang</p>
                            <a href="./customer_data.php" class="btn btn-primary">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 300px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #0da4e3">Total Pendapatan</h5>
                            <p class="card-text">
                                <?php
                                    $transaksi = 0;
                                    foreach (get_data_penjualan() as $record) {
                                        $transaksi = $transaksi + ($record[4] * get_data_produk_by_id($record[2])[2]);
                                    }
                                    echo "Rp ".$transaksi;
                                ?>
                            </p>
                            <a href="./penjualan_data.php" class="btn btn-primary">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
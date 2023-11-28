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
    <title>Data Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/general.css">
    <link rel="stylesheet" href="../style/component.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../script/Header.js"></script>
    <script src="https://kit.fontawesome.com/eff27b1688.js" crossorigin="anonymous"></script>
</head>

<body>
    <main-header active="customer_data"></main-header>
    <div class="container-fluid w-100 p-0" style="margin-top: 100px !important;position: absolute;">
        <div class="container mx-auto px-5 mt-1">
            <ul class="p-0 position-relative">
                <li style="display: inline-block;">
                    <h2 style="color: white;font-weight: bold;">Daftar Customer</h2>
                </li>
                <!-- <li class="position-absolute end-0" style="display: inline-block;">
                    <a href="./customer_add.php">
                        <button type="button" class="btn btn-success" style="font-size: 11pt !important;">+ Tambah</button>
                    </a>
                </li> -->
            </ul>
            <table class="table border-primary mt-3" style="color: white;">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Total Transaksi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (get_data_customer() as $result) {
                        ?>
                        <tr>
                            <td>
                                <?= $result[1] . ' ' . $result[2] ?>
                            </td>
                            <td><a class="link-underline link-underline-opacity-0" href="mailto:<?= $result[3] ?>"><?= $result[3] ?></a></td>
                            <td><a class="link-underline link-underline-opacity-0"
                                    href="https://wa.me/<?= $result[4] ?>"><?= $result[4] ?></a></td>
                            <td>
                                <?= $result[5] ?>
                            </td>
                            <td>
                                <?php
                                $transaksi = 0;
                                foreach(get_data_penjualan_by_customer($result[0]) as $record){
                                    $transaksi = $transaksi + ($record[4] * get_data_produk_by_id($record[2])[2]);
                                }
                                echo "Rp ".$transaksi;
                                ?>
                            </td>
                            <td>
                                <a href="./customer_edit.php?id=<?= $result[0] ?>"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <!-- <a href="./customer_delete.php?id=<?= $result[0] ?>" style="margin-left: 10px;"><i
                                        class="fa-solid fa-trash"></i></a> -->
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
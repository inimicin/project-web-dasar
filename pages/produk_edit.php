<?php
include('../script/produk.php');

session_start();

if (!(session_status() == PHP_SESSION_ACTIVE && session_id() == "admin")) {
    header("location: ../index.php");
}

$result = get_data_produk_by_id($_GET['id']);

if(isset($_POST['submit'])) {
    $status = update_data_produk($_GET['id'], $_POST['nama_produk'], $_POST['harga'], $_POST['stok']);

    if($status) {
        header('location: ./produk_data.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/general.css">
    <link rel="stylesheet" href="../style/component.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../script/Header.js"></script>
    <script src="https://kit.fontawesome.com/eff27b1688.js" crossorigin="anonymous"></script>
</head>

<body>
    <main-header active="produk_data"></main-header>
    <div class="container-fluid w-100 p-0" style="margin-top: 100px !important;position: absolute;">
        <div class="container mx-auto px-5 mt-1" style="margin-bottom: 100px !important;">
            <ul class="p-0 position-relative">
                <li style="display: inline-block;">
                    <h2 style="color: white;font-weight: bold;">Edit Data Produk</h2>
                </li>
            </ul>
            <form method="POST" action="./produk_edit.php?id=<?= $_GET['id'] ?>">
                <div class="mb-3">
                    <label for="nama_produk" class="form-label" style="color: white;">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $result[1] ?>">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label" style="color: white;">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $result[2] ?>">
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label" style="color: white;">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?= $result[3] ?>" readonly>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>
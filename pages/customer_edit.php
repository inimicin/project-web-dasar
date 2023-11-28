<?php
include('../script/customer.php');

session_start();

if (!(session_status() == PHP_SESSION_ACTIVE && session_id() == "admin")) {
    header("location: ../index.php");
}

$result = get_data_customer_by_id($_GET['id']);

if(isset($_POST['submit'])) {
    $status = update_data_customer($_GET['id'], $_POST['nama_depan'], $_POST['nama_belakang'], $_POST['email'], $_POST['no_telepon'], $_POST['alamat']);

    if($status) {
        header('location: ./customer_data.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/general.css">
    <link rel="stylesheet" href="../style/component.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../script/Header.js"></script>
    <script src="https://kit.fontawesome.com/eff27b1688.js" crossorigin="anonymous"></script>
</head>

<body>
    <main-header active="customer_data"></main-header>
    <div class="container-fluid w-100 p-0" style="margin-top: 100px !important;position: absolute;">
        <div class="container mx-auto px-5 mt-1" style="margin-bottom: 100px !important;">
            <ul class="p-0 position-relative">
                <li style="display: inline-block;">
                    <h2 style="color: white;font-weight: bold;">Edit Data Customer</h2>
                </li>
            </ul>
            <form method="POST" action="./customer_edit.php?id=<?= $_GET['id'] ?>">
                <div class="mb-3">
                    <label for="nama_depan" class="form-label" style="color: white;">Nama Depan</label>
                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?= $result[1] ?>">
                </div>
                <div class="mb-3">
                    <label for="nama_belakang" class="form-label" style="color: white;">Nama Belakang</label>
                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?= $result[2] ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" style="color: white;">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $result[3] ?>">
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label" style="color: white;">No Telepon</label>
                    <input type="number" class="form-control" id="no_telepon" name="no_telepon" value="<?= substr($result[4], 3) ?>" aria-describedby="teleponHelp">
                    <div id="teleponHelp" class="form-text" style="color: white;">Masukkan No Telepon tanpa kode negara, sistem akan memasukkan kode negara secara otomatis</div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label" style="color: white;">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="4"><?= $result[5] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>
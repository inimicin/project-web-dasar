<?php

include('../script/account.php');

if (isset($_POST['submit'])) {

  if (auth($_POST['email_address'], $_POST['password'])) {
    session_id('admin');
    session_start();
    header('location: ./home.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
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
  <div class="container-fluid main-body w-100" style="height: 100vh">
    <div class="container-fluid form-container px-5" style="
          width: 40%;
          padding-right: 50px;
          position: absolute;
          top: 40%;
          left: 50%;
          transform: translate(-50%, -50%);
        ">
      <form method="POST" action='./login.php'>
        <h2 class="text-center" style="color: white; margin-bottom: 70px;font-weight: bold;">Login</h2>
        <div class="mb-3">
          <label for="email_address" class="form-label" style="color: #0da4e3;">Email Address</label>
          <input type="email" class="form-control" id="email_address" name="email_address">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label" style="color: #0da4e3;">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary btn-save mt-2 w-100" name='submit'>Submit</button>
      </form>
    </div>
    <div class="container-fluid container-image h-100 mx-0" style="
        width: 40%;
          position: absolute;
          top: 50%;
          left: 60%;
          transform: translate(0, -50%);
        "></div>
  </div>
</body>

</html>
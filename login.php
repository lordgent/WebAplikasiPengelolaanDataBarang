<?php

session_start();

require 'config.php';


if (isset($_POST["submit"])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $cek = mysqli_query($conn, "SELECT * FROM user where username = '$username' ");

  if (mysqli_num_rows($cek) === 1) {

    $row = mysqli_fetch_assoc($cek);
    if (password_verify($password, $row['password'])) {

      //session

      $_SESSION['username'] = $username;
      $_SESSION['iduser'] = $row['iduser'];
      echo '<script>alert("Login Berhasil"); window.location.href= "index.php";</script>';


      exit;
    }
  } else {
    echo ' <script> alert("username/password salah"); </script> ';
    die;
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      background-color: #212F3D;

      background-size: cover;
      background-position: 0 -40px;

    }



    .form-control {
      border-radius: 20px;
    }

    .masuk {

      border-radius: 20px;
    }

    form {
      border: 6px solid white;
      width: 400px;
      height: 450px;
      border-radius: 10px;
      background-color: #FBFCFC;




    }

    .ha {
      margin-top: 20px;
    }
  </style>
</head>

<body>

  <!-- Image and text -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/inventory.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App INVENTORY
      </a>
    </div>
  </nav>
  <br><br>


  <center>

    <form action="" method="post">
      <div class="container opa">
        <h4 class="text-center ha">LOGIN<img src="img/admin.png" alt=""></h4>
        <center><small class=" text-center">Dashboard Admin</small></center>
        <br>

        <div class="form-group">

          <input type="text" class="form-control" name="username" placeholder="username">

        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary masuk">Masuk</button>
      </div>
      <br>
      <img src="img/928.jpg" alt="" height="150" class="shadow">
    </form>
  </center>






  <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php   

session_start();


if(!isset($_SESSION['username'])) {

  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}


require 'config.php';

if( isset($_POST['submit'] ) > 0 ) {



$role = $_POST['role'];
$username = $_POST['username'];
$pass = $_POST['password'];
$pass2 = $_POST['password2'];

if( $pass !== $pass2 ) {

  echo '<script>
          alert("Password yang anda masukan tidak sama!");
        </script>'
        ;

        return false;

}


//enkripsi
$pass = password_hash($pass, PASSWORD_DEFAULT);

$daftar =  mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$role', '$username',  '$pass') ");

if($daftar) {

    echo '<script> alert("User baru berhasil di tambahkan!");  window.location.href= "user.php";</script>';


}

return mysqli_affected_rows($conn);



}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>index</title>
    <style>
    body{
      background-image: url('img/moun.jpg');
      background-size: absolute;
    }
  
    </style>
   


  </head>
  <body>

   
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="img/inventory.png" alt=""> Inventaris Barang</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-5">
      <li class="nav-item">
        <a class="nav-link" href="barang.php">Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reportdata.php">Report Data</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Konfigurasi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="jbarang.php">jenis Barang</a>
          <a class="dropdown-item" href="kondisi.php">Kondisi</a>
          <a class="dropdown-item" href="ruangan.php">Ruangan</a>
          <a class="dropdown-item" href="user.php">User/Admin</a>
          <a class="dropdown-item" href="merk.php">Merk</a>
          
      </li>
    </ul>
    <a href="logout.php" onclick="return confirm('kamu yakin mau Keluar?');"><img src="img/log-out.png" alt="" width=""></a>
    
  </div>
</nav>
<br>
<br><br>

<!-- register -->
<br><br>
<form action="" method="post">
<h3 class="text-center">Tambah User
  <img src="img/man.png" alt="" height="30">
  </h3>
<div class="container">
<div class="form-group">
    <input type="nama" class="form-control" id="nama" name="role" placeholder="Enter name">
  </div>
  <div class="form-group">

    <input type="nama" class="form-control" id="nama" name="username" placeholder="Username">
  </div>
 
  <div class="form-group">
  
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
  </div>
  <div class="form-group">
    <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Confirm password"> 
  </div>
  
 <button type="submit" name="submit"  class="btn btn-primary login">DAFTAR</button>
            <a  class="btn btn-danger" href="user.php">Batal</a>
  
  </div>
</form>
</div>


<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>

  </body>
</html>
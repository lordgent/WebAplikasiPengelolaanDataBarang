<?php

session_start();


if(!isset($_SESSION['username'])) {

  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}

require 'config.php';

$id = $_GET['id'];
$jb = mysqli_query($conn, "SELECT * FROM tbljbarang WHERE id_jbarang = $id");

if(isset($_POST['submit'])) {
      $idjb = $_POST['id_jbarang'];
        $njb = $_POST['nama_jbarang'];


    $ejb = "UPDATE tbljbarang SET id_jbarang = $idjb, nama_jbarang = '$njb' WHERE id_jbarang = $id";


    if(mysqli_query($conn, $ejb)) {

        echo ' <script> confirm("Kamu yakin mau merubah data ini??");
                    window.location.href = "jbarang.php"
                </script> ';

    } else {
        echo 'data gagal di ubah';
    }
 

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit kondisi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    body{
      background-image: url('img/moun.jpg');
      background-size: absolute;
    }
  </style>
    
</head>
</head>
<body>
    
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
  <img src="img/inventory.png" alt="">
  Inventaris Barang</a>
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
    <h3 class="text-center">Edit Jenis Barang</h3>


    <br>
   <?php  foreach($jb as $row) : ?>
    <form method="post" action=""> 
    
    <div class="container">
    <div class="form-group">
   
    <input type="hidden" name="id_jbarang" value="<?= $row['id_jbarang']; ?> ">
  </div>
  <div class="form-group">
    <label>KONFIGURASI Jenis Barang</label>
    <input type="text" name="nama_jbarang" value=" <?= $row['nama_jbarang']; ?>" class="form-control" >
  </div>
 
  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
    <a  class="btn btn-danger" href="jbarang.php">Batal</a>
  </div>
</form>
<?php endforeach; ?>
 



<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
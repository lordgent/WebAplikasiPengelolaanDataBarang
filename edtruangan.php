<?php

session_start();


if(!isset($_SESSION['username'])) {

  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}

require 'config.php';

$id = $_GET['id'];
$sel = mysqli_query($conn, "SELECT * FROM ruangan WHERE idruang = $id");

if(isset($_POST['submit'])) {
      $idru = $_POST['idruang'];
        $ruang = $_POST['ruangan'];


    $inst = "UPDATE ruangan SET idruang = $idru, ruangan = '$ruang' WHERE idruang = $id";


    if(mysqli_query($conn, $inst)) {

        echo ' <script> confirm("Kamu yakin mau merubah data ini??");
                    window.location.href = "ruangan.php"
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

    <div class="container">
    <br>
    <h3 class="text-center">Edit Ruangan</h3>


    <br>
   <?php  foreach($sel as $row) : ?>
    <form method="post" action=""> 
    
    <div class="container">
    <div class="form-group">
   
    <input type="hidden" name="idruang" value="<?= $row['idruang']; ?> ">
  </div>
  <div class="form-group">
    <label>KONFIGURASI Ruangan</label>
    <input type="text" name="ruangan" value=" <?= $row['ruangan']; ?>" class="form-control" placeholder="Contoh : BAIK/RUSAK">
  </div>
 
  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
    <a  class="btn btn-danger" href="ruangan.php">Batal</a>
  </div>
</form>
<?php endforeach; ?>
    </div>

</div>




<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
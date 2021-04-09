<?php   

session_start();


if(!isset($_SESSION['username'])) {
  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}


error_reporting(0);
require 'config.php';

$ruangan = mysqli_query($conn, "SELECT * FROM ruangan");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    body{
      background-image: url('img/moun.jpg');
      background-size: absolute;
    }
    .table{
      background-color: #FBFCFC;
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

    <div class="container">
    <br>
    <form class="form-inline my-2 my-lg-0" action="" method="post">
      <input class="form-control mr-sm-2" placeholder="Lebokno" name="namamerk">
      <button class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit">Cari</button>
    </form>

    <h5 class="text-center">KONFIGURASI RUANGAN</h5>

   

    <a href="tbhruangan.php" class="btn btn-dark"> 
    <img src="img/plus.png" height="20" alt=""> Tambah Ruangan
    </a>
    
    <table class="table" >
  <thead class="thead-dark">

    <tr>
      <th scope="col">No</th>
      <th scope="col">Ruangan</th>
      <th>Foto Lokasi</th>
      <th scope="col">Config</th>
    </tr>
  </thead>
  <tbody>
  
  <?php  $i = 1; ?>
 
    <tr>
    <?php  foreach($ruangan as $ru ) : ?>
      <td scope="row"> <?= $i; ?> </td>
      <td> <?= $ru['ruangan']; ?> </td>
      <td> <img src="img/<?=$ru ['foto']; ?>" alt="" width="80"> </td>
      <td>
        <a href="edtruangan.php?id=<?=$ru['idruang'];?>">
         <img src="img/browser.png" alt="" height="20">
         </a>
         <a href="dltruang.php?id=<?= $ru['idruang']; ?>" onclick="return confirm('kamu yakin mau menghapus data ini??');"> 
         <img src="img/trash.png" height="20" alt="">
         </a>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach;  ?>
 
  
  
  </tbody>
</table>

</div>

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
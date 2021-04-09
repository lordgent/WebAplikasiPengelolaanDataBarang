<?php 

session_start();


if(!isset($_SESSION['username'])) {

echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}

require 'config.php';

error_reporting(0);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
     body{
      background-image: url('img/moun.jpg');
      background-size: cover;
    }
    .table{
      background-color: #FBFCFC;
    }
  
    </style>
</head>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
  <img src="img/inventory.png" alt="">Inventaris Barang</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-5">
      <li class="nav-item">
        <a class="nav-link active" href="barang.php">Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reportdata.php">Report Data</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<div class="container">
    
    <h2 class="text-center">Data Barang</h2>

    <?php

    if(isset($_POST['cari'])){
    $cari = $_POST['keyword'];


      $selek = mysqli_query($conn, "SELECT * FROM tblbarang 
      INNER JOIN merk ON tblbarang.idmerk = merk.idmerk
      INNER JOIN tbljbarang ON tblbarang.id_jbarang = tbljbarang.id_jbarang
      INNER JOIN ruangan ON tblbarang.idruang = ruangan.idruang 
      WHERE nama_jbarang LIKE '%$cari%'

");


    } else {

      $selek = mysqli_query($conn, "SELECT * FROM tblbarang 
      INNER JOIN merk ON tblbarang.idmerk = merk.idmerk
      INNER JOIN tbljbarang ON tblbarang.id_jbarang = tbljbarang.id_jbarang
      INNER JOIN ruangan ON tblbarang.idruang = ruangan.idruang

    
      ");
    
    }
   
    
    ?>

    <form class="form-inline" action="" method="post">
      <input class="form-control m-sm-2" placeholder="Cari data barang.." name="keyword">
      <button class="btn btn-dark my-2 my-sm-0" name="cari" type="submit">Cari</button>
    </form>

    <a href="tbhbarang.php" class="btn btn-dark"> 
    <img src="img/plus.png" height="20" alt=""> Tambah Barang
    </a>

    

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">KODE</th>
      <th scope="col">JENIS BARANG</th>
      <th scope="col">MERK</th>
      <th scope="col">TIPE</th>
      <th scope="col">RUANGAN</th>
      <th scope="col"> <img src="img/settings.png" alt=""> CONFIG</th>
    </tr>
  </thead>
  <tbody>
        <?php  $i=1; ?>
        <?php  while($row = mysqli_fetch_array($selek)) { ?>
    <tr>
      <td scope="row"> <?= $i; ?>. </td>
      <td> <?= $row['kode']; ?> </td>
      <td> <?= $row['nama_jbarang']; ?> </td>
      <td> <?=  $row['namamerk']; ?> </td>
      <td> <?= $row['tipe']; ?> </td>
      <td> <?= $row['ruangan']; ?></td>
      <td>
          <a href="editbarang.php?id=<?= $row['idbarang']; ?>">  <img src="img/browser.png" width="20" alt=""> </a>
          <a href="dltbarang.php?id=<?= $row['idbarang']; ?>" onclick="return confirm('kamu yakin menghapus?');">  <img src="img/trash.png" width="20" alt=""> </a>
          <br><br> <a href="data.php?id=<?= $row['idbarang']; ?>" class="btn btn-success">Detail</a>
          <a href="cekbarang.php?id=<?= $row['idbarang']; ?>" class="btn btn-primary">cek</a>
      </td>
    </tr>
 <?php  $i++; ?>
  <?php } ?>
   
  </tbody>
</table>
    
  </div>
  

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

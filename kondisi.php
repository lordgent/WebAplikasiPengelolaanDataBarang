<?php    

session_start();


if(!isset($_SESSION['username'])) {
  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}


require 'config.php';

$ambil = mysqli_query($conn, "SELECT * FROM tblkondisi");




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
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




  <br><br>
   <div class="container">
  <h4 class="text-center">KONFIGURASI KONDISI</h4>
  <a href="tbhkondisi.php" class="btn btn-dark"> 
    <img src="img/plus.png" height="20" alt="">Tambah kondisi
    </a>
    <br>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Kondisi</th>
      <th scope="col">Config</th>
    </tr>
  </thead>
  <tbody>
  <?php  $i = 1; ?>
  <?php  foreach($ambil as $po ) : ?>

    <tr>
      <th scope="row"> <?=  $i; ?> </th>
      <td> <?= $po['kondisi']; ?> </td>
   
      <td>
        <a href="editkon.php?id=<?= $po['idkondisi']; ?>"> <img src="img/browser.png" alt="" height="20"> </a>
        <a href="dltkondisi.php?id=<?= $po['idkondisi']; ?>" onclick="return confirm('kamu yakin mau menghapus data ini?');"> <img src="img/trash.png" alt="" height="20"> </a>
      </td>
    </tr>
    <?php  $i++; ?>
    <?php  endforeach; ?>
   
  
  </tbody>

    
   
  </tbody>
 </table> 
 </div>




    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
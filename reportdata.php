<?php    

session_start();


if(!isset($_SESSION['username'])) {

  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}
require 'config.php';


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
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"> 
  <img src="img/inventory.png" alt=""> Inventaris Barang</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-5">
      <li class="nav-item">
        <a class="nav-link" href="barang.php">Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="reportdata.php">Report Data</a>
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
    <h2 class="text-center">Rekap Data Barang</h2>
    <table class="table">
  <thead class="thead-dark">
  <h4 >Report Data merk</h4>
    <tr>
      <th scope="col">Kondisi</th>
      <th scope="col">Jumlah</th>
      
    </tr>
  </thead>
  <tbody>
  <?php  $kondisi = mysqli_query($conn, "SELECT * FROM tblkondisi left join 
  hitung_bykondisi on tblkondisi.idkondisi=hitung_bykondisi.idkondisi
");
foreach($kondisi as $riw ) :
  ?>
    <tr>
      <th scope="row"> <?= $riw['kondisi']; ?> </th>
      <td> <?= $riw['jumlah']; ?> </td>
      
    </tr>
    <?php endforeach;  ?>
  </tbody>
</table>



<h4>Report Data Jenis barang</h4>
<?php $jenis = mysqli_query($conn, "SELECT * FROM tbljbarang left join hitungjbarang on tbljbarang.id_jbarang=hitungjbarang.id_jbarang

");

?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Jenis Barang</th>
      <th scope="col">Jumlah</th>
      
    </tr>
  </thead>
  <tbody>
  <?php  foreach($jenis as $row ) : ?>
    <tr>
      
      <td> <?= $row['nama_jbarang']; ?> </td>
      <td> <?= $row['jumlah']; ?> </td>
      
    </tr>
    <?php endforeach;  ?>
  </tbody>
</table>



<br>
<h4 class="text-white">Rekap Ruangan</h4>
<table class="table">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Ruangan</th>
      <th scope="col">Jumlah</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $ruang = mysqli_query($conn, "SELECT * FROM ruangan LEFT JOIN hitungruang on ruangan.idruang = hitungruang.idruang 
  WHERE ruangan IS NOT NULL");
  
  foreach($ruang as $rew ) : ?>
    <tr>
      
      <td> <?= $rew['ruangan']; ?> </td>
      <td> <?= $rew['jumlah']; ?> </td>
      
    </tr>
    <?php endforeach;  ?>
  </tbody>
</table>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
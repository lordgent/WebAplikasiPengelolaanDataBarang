<?php   

session_start();

if(!isset($_SESSION['username'])) {

  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}

require 'config.php';

$id = $_GET['id'];

$detail = mysqli_query($conn, "SELECT * FROM tblbarang 
          INNER JOIN tbljbarang ON tblbarang.id_jbarang = tbljbarang.id_jbarang
          INNER JOIN merk ON tblbarang.idmerk = merk.idmerk
          INNER JOIN tblkondisi ON tblbarang.idkondisi = tblkondisi.idkondisi
          INNER JOIN ruangan ON tblbarang.idruang = ruangan.idruang
          INNER JOIN user ON tblbarang.iduser = user.iduser
          WHERE idbarang = $id
");

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
  
   
.data{
  border: 3px solid #F4F6F7;
  background-color: #F4F6F7;
}
  
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="img/inventory.png" alt=""> Inventaris Barang</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-5">
      <li class="nav-item">
        <a class="nav-link active" href="barang.php">Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Report Data</a>
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

<center>

<br><h3>Detail Data Barang</h3>
<?php foreach($detail as $row ) : ?>
<div class="data">

<img src="img/<?= $row['fotobarang']; ?>" alt="" width="200">
<p>Kode: <?= $row['kode']; ?> </p>
<p>Jenis Barang: <?= $row['nama_jbarang']; ?> </p>
<p>merk:  <?= $row['namamerk']; ?> </p>
<p>Tipe:  <?= $row['tipe']; ?> </p>
<p>Spesifikasi:  <?= $row['spesifikasi']; ?> </p>
  <p>No inventaris:  <?= $row['noinventaris']; ?> </p>
<p>Tahun perolehan: <?= $row['tahunperolehan']; ?> </p>
<p>Kondisi:<?= $row['kondisi']; ?> </p>
<p>Lokasi: <?= $row['ruangan']; ?></p>
<p>Tanggal dicek: <?= $row['tanggaldicek']; ?></p>
<p>Di cek: <?= $row['username']; ?></p>

<a href="barang.php" class="btn btn-success">Kembali</a>

</div>

<?php endforeach; ?>

</center>



    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
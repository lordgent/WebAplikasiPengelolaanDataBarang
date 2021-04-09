<?php 

session_start();

$_POST['iduser'] = $_SESSION['iduser'];

if(!isset($_SESSION['username'])) {
  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}

require 'config.php';


  
    if(isset($_POST['submit'])) {
      
      $kode = $_POST['kode'];
      $jbarang = $_POST['id_jbarang'];
      $merk = $_POST['idmerk'];
      $tipe = $_POST['tipe'];
      $spek = $_POST['spesifikasi'];
      $noinv = $_POST['noinventaris'];
      $thnperolehan = $_POST['tahunperolehan'];
      $kondisi = $_POST['idkondisi'];
      $ruang = $_POST['idruang'];
      $user = $_POST['iduser'];
      $ket = $_POST['ket'];
  

$rand = rand();
$ekstensi = array('jpg', 'jpeg', 'png');
$nama_file = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['size'];
$ext = pathinfo($nama_file, PATHINFO_EXTENSION);

if(!in_array($ext, $ekstensi)) {

  echo 'gagal!';
  return false;

}else {

  if($tmp < 2097152) {

  

      $xx = $rand.'_'.$nama_file;
      move_uploaded_file($_FILES['foto']['tmp_name'], 'img/' .$rand.'_'.$nama_file);
      
      mysqli_query($conn, "INSERT INTO tblbarang VALUES 
      (NULL,'$kode',$jbarang,$merk,'$tipe','$spek',
      '$noinv','$thnperolehan',$kondisi,'$xx','$ruang',NULL,'$user','$ket') 
      ");
      header("Location: barang.php");

  }
      
    

    
    
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
    body{
      background-image: url('img/moun.jpg');
      background-size: absolute;
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


  
    <br>
    <form method="post" action="" enctype="multipart/form-data"> 

    <div class="container">
    <h3 class="text-center">Tambah Barang</h3>
   
  <div class="form-group">
    <label>Masukan Kode Barang</label>
    <input type="text" name="kode" class="form-control" placeholder="Kode Barang" value="">
  </div>
  


  <label for="">Jenis Barang</label>
  
    <select name="id_jbarang" id="" class="form-control">

  <?php $jbarang = mysqli_query($conn, "SELECT * FROM tbljbarang"); 
    while($row = mysqli_fetch_assoc($jbarang)) {
  ?>  
  <option value="<?= $row['id_jbarang']; ?> "> <?= $row['nama_jbarang']; ?> </option>
  <?php }  ?>

    </select>
    



  <label for="">Merk</label>
    <select name="idmerk" id="" class="form-control" rows="10">
         <?php $selekk = mysqli_query($conn, "SELECT * FROM merk"); ?> 
      <?php  while($row = mysqli_fetch_array($selekk))  { ?>

        <option value=" <?= $row['idmerk']; ?> "> <?= $row['namamerk']; ?> </option>
        <?php } ?>
    </select>
   


  <div class="form-group">
    <label>Tipe</label>
    <input type="text" name="tipe" class="form-control" placeholder="tipe">
  </div>




  <textarea name="spesifikasi" id="" cols="30" rows="5" placeholder="Spesifikasi Barang"></textarea>

  <div class="form-group">
    <label>No Inventaris</label>
    <input type="text" name="noinventaris" class="form-control" placeholder="No inventaris">
  </div>




  <div class="form-group">
    <label>Tahun perolehan</label>
    <input type="date" name="tahunperolehan" class="form-control" placeholder="Tahun perolehan">
  </div>

  <label for="">Kondisi</label>
   
   <select name="idkondisi" id="" class="form-control" rows="10">
         
   <?php  $kond = mysqli_query($conn, "SELECT * FROM tblkondisi"); 
    while($row = mysqli_fetch_assoc($kond)) {
   ?>
       <option value="<?= $row['idkondisi']; ?>"> <?= $row['kondisi']; ?> </option>
       <?php } ?>
   </select>

   <div class="form-group">
    <label>Gambar</label>
    <input type="file" name="foto" class="form-control">
  </div>
    


  <label for="">Ruangan</label>
   
   <select name="idruang" id="" class="form-control" rows="1">
         
     <?php $ruang = mysqli_query($conn, "SELECT * FROM ruangan"); ?>
     <?php  while($riw = mysqli_fetch_array($ruang)) { ?>
       <option value="<?=  $riw['idruang']?> "> <?= $riw['ruangan']; ?> </option>
      <?php } ?>
   </select>
   
   




<input type="hidden" name="iduser" value="<?= $_SESSION['iduser']; ?>">




<textarea name="ket" cols="30" rows="10"></textarea>




 
<br>
  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
    <a  class="btn btn-danger" href="barang.php">Batal</a>
    <br>
  </div>
</form>

  

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
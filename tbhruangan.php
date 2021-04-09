<?php

session_start();


require 'config.php';


if( isset($_POST['submit'])) {

$ruang = $_POST['ruangan'];

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
      mysqli_query($conn, "INSERT INTO ruangan VALUES (NULL, '$ruang','$xx' )");
      header("Location: ruangan.php");

  } else{
    echo '<script>alert("ukuran gambar terlalu bersar!"); window.location.href="tbhruangan.php"</script>';
    return false; 
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
   
    <form method="post" action="" enctype="multipart/form-data"> 
    <div class="container">
  <div class="form-group">
    <label>Nama Ruangan</label>
    <input type="text" name="ruangan" class="form-control" placeholder="Contoh : LAB TKJ/LAB DESAIN">
  </div>
  <div class="form-group">
    <label>Foto Ruangan</label>
    <input type="file" name="foto" class="form-control">
  </div>
  
  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
    <a  class="btn btn-danger" href="ruangan.php">Batal</a>
  </div>
</form>
    </div>



    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php    

session_start();

$_POST['iduser'] = $_SESSION['iduser'];

if(!isset($_SESSION['username'])) {
  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}

require 'config.php';
$cekbarang = mysqli_query($conn, "SELECT * FROM tblbarang 


");


if(isset($_POST['cek'])) {

  $id = $_GET['id'];
  $kondisi = $_POST['idkondisi'];
  $usr = $_POST['iduser'];
  $ket = $_POST['ket'];

  $upt = mysqli_query($conn, "UPDATE tblbarang SET idkondisi = '$kondisi', iduser = '$usr', ket = '$ket' WHERE idbarang = $id ");

  if($upt) {
    echo '<script>alert("Data berhasil di cek dan di Update"); window.location.href= "barang.php";  </script>' ; 
  }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cek Barang</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    body{
      background-image: url('img/moun.jpg');
      background-size: absolute;
    }
  
 .cek{
   border: 5px solid #ECF0F1 ;
   border-radius: 30px;
   width: 60%;
   background-color: #ECF0F1;
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
    <h3 class="text-center">Cek Barang</h3>
    <center>
<div class="cek">
<?php $idb = $_GET['id']; ?>
<?php $cth = mysqli_query($conn, "SELECT * FROM tblbarang INNER JOIN user ON tblbarang.iduser = user.iduser WHERE idbarang = $idb");
 foreach($cth as $po) :  ?>
<img src="img/<?=$po['fotobarang'];  ?>" alt="" width="100">
<h5>KODE BARANG: <?= $po['kode']; ?></h5>
<h5>Terakhir Dicek oleh: <?= $po['username']; ?></h5>
<p>Pada: <?= $po['tanggaldicek']; ?></p>
<p><strong> Catatan: <?= $po['ket']; ?></strong> </p>
<?php  endforeach; ?>


</div>
</center>
<br>


<form action="" method="post">

<div class="container">


<select name="idkondisi" id="" class="form-control">
<?php 
$kondisi = mysqli_query($conn, "SELECT * FROM tblkondisi");
 foreach($kondisi as $row) : ?>
<option value="<?= $row['idkondisi']; ?>"> <?= $row['kondisi']; ?> </option>
<?php endforeach;  ?>
</select>


<input type="hidden" value=" <?= $_SESSION['iduser']; ?> " name="iduser">

<div class="form-group">
    
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket"placeholder="berikan catatan/keterangan.."></textarea>
  </div>

<button class="btn btn-primary" name="cek" type="submit"> Done </button>
<a href="barang.php" class="btn btn-danger">Batal</a>


  </div>  
 

</form>





    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
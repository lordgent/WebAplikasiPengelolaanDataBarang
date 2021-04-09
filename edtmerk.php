<?php    

session_start();


if(!isset($_SESSION['username'])) {

  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

}


require 'config.php';


$id = $_GET['idmerk'];
$merk = mysqli_query($conn, "SELECT * FROM merk WHERE idmerk= $id ");

if( isset($_POST['submit']) ) {

$idmerk = $_POST['idmerk'];
$merk = $_POST['namamerk'];


$edt = "UPDATE merk SET 

            idmerk = '$idmerk',
            namamerk = '$merk'

        WHERE idmerk = $id

             ";

mysqli_query($conn, $edt);


header('Location: merk.php');

return mysqli_affected_rows($conn);


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
   <?php  foreach($merk as $row ) :?>
    <form method="post" action=""> 
    <div class="container">
    <h4 class="text-center">EDIT MERK</h4>
    <div class="form-group">
    <input type="hidden" name="idmerk" value=" <?= $row['idmerk']; ?> ">
  </div>
  
  <div class="form-group">
    <label>Masukan MERK</label>
    <input type="text" name="namamerk" class="form-control" placeholder="Contoh : MIKROTIK/CISCO" value=" <?= $row['namamerk']; ?> ">
  </div>
  
  <button type="submit"  name="submit" class="btn btn-primary" onclick="return confirm('kamu yakin mau mengedit data ini?'); " >Submit</button>
    <a  class="btn btn-danger" href="merk.php">Batal</a>
  </div>
</form>
<?php endforeach;  ?>
    

</div>

    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
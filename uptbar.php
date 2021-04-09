<?php 
session_start();


if(!isset($_SESSION['username'])) {

  echo '<script>alert("Silahkan Login dulu!"); window.location.href= "login.php";</script>';

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
    

  
<nav class="navbar navbar-light bg-dark">

  <a class="navbar-brand text-white" href="index.php">
    <img src="img/inventory.png" width="30" height="30" class="d-inline-block align-top" alt="">
    BLK_Inventaris
  </a>
  <a href="logout.php" onclick="confirm('kamu yakin mau keluar?');"> <img src="img/log-out.png"  alt=""></a>
</nav>


<div class="row">
    <div class="col-md-3">
    <div class="list-group">
   
  <a href="user.php" class="list-group-item list-group-item-action bg-dark text-white hov"><img src="img/man.png" alt="" height="20"> User/admin</a>
  <a href="barang.php" class="list-group-item list-group-item-action bg-dark text-white hov"><img src="img/inventory.png" alt="" height="20"> Barang</a>
  <a href="kondisi.php" class="list-group-item list-group-item-action bg-dark text-white"> <img src="img/writing.png" alt="" height="20"> Kondisi</a>
  <a href="merk.php" class="list-group-item list-group-item-action bg-dark text-white"> <img src="img/admin.png" alt="" height="20"> Merk</a>
  <a href="jbarang.php" class="list-group-item list-group-item-action bg-dark text-white"> <img src="img/packages.png" alt="" height="20"> Jenis Barang</a>
  <a href="ruangan.php" class="list-group-item list-group-item-action bg-dark text-white"><img src="img/setting.png" alt="" height="20"> Ruangan</a>
  <a href="reportdata.php" class="list-group-item list-group-item-action bg-dark text-white"><img src="img/project.png" alt="" height="20">Report Data</a>
  
</div>
    </div>
    <div class="col-md-9">
    <br>
   
    <form method="post" action=""> 
    <div class="container">
  <div class="form-group">
    <label>Update jenis barang</label>
    <input type="text" name="jenisbarang" class="form-control" placeholder="Contoh : Router/Keyboard">
  </div>
  
  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
    <a  class="btn btn-danger" href="jbarang.php">Batal</a>
  </div>
</form>
    </div>

</div>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
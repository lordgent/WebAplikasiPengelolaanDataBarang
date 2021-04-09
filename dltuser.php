<?php 
session_start();
require 'config.php';


// if($_SESSION['username']){
// $id = $_GET['id'];
// $cekuser = mysqli_query($conn, "SELECT * FROM user WHERE iduser = $id");


// }
$id = $_GET['id'];
if($_SESSION['iduser'] !== $id) {

  
  $id = $_GET['id'];
  $del =  mysqli_query($conn, "DELETE FROM user WHERE iduser = '$id' ");
  
  
  if($del > 0 ) {
    header('location: user.php');
   
  } 

} else {

  echo '<script>alert("dilarang mengahpuus diri sendiri !!"); window.location.href="user.php";</script>';
  exit;

}






?>
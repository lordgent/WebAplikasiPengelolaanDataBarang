<?php 

require 'config.php';

$id = $_GET['id'];
$del =  mysqli_query($conn, "DELETE FROM tblbarang WHERE idbarang = '$id' ");

if($del > 0 ) {

    
    echo '<script> alert("berhasil"); window.location.href= "barang.php";</script>';


} 

return mysqli_affected_rows($conn);

?>

<?php 

require 'config.php';

$id = $_GET['idmerk'];
$del =  mysqli_query($conn, "DELETE FROM merk WHERE idmerk = '$id' ");

if($del > 0 ) {

    
    header('location: merk.php');


} else {
    echo '<script>alert("Data masih berhubungan dengan tabel lain!");  window.location.href="merk.php";</script>';
    exit;
}

return mysqli_affected_rows($conn);

?>
<?php 

require 'config.php';

$id = $_GET['id'];
$del =  mysqli_query($conn, "DELETE FROM tblkondisi WHERE idkondisi = '$id' ");

if($del > 0 ) {

    
    header('location: kondisi.php');


} 

return mysqli_affected_rows($conn);

?>
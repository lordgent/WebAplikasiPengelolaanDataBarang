<?php 

require 'config.php';

$id = $_GET['id'];
$del =  mysqli_query($conn, "DELETE FROM ruangan WHERE idruang = '$id' ");

if($del > 0 ) {

    
    header('location: ruangan.php');


} 

return mysqli_affected_rows($conn);

?>
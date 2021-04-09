<?php 

require 'config.php';

$id = $_GET['id'];
$del =  mysqli_query($conn, "DELETE FROM tbljbarang WHERE id_jbarang = '$id' ");

if($del > 0 ) {

    
    header('location: jbarang.php');


} 

return mysqli_affected_rows($conn);

?>
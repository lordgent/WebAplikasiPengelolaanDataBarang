<?php    

$conn = mysqli_connect("localhost", "root", "", "dbbarang");


if($conn ) {

} else {
    echo  "mysql connect error" . mysqli_connect_error();
        die();
}



?>

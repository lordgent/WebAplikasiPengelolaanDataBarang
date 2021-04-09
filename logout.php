<?php

session_start();

if(!isset($_SESSION['username'])){
session_destroy();
session_unset();

}
else{
header( "Location: login.php" );

}

?>
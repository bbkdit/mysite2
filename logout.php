<?php  
session_start();

session_destroy();

header( "Location:checkout.php" );

//echo "<script>window.open('site.php','_self')</script>";
?>
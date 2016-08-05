<?php
  $host="localhost";
$hname="root";
$hpass="";
$db="ecommerce";

$con = mysqli_connect("$host", "$hname", "") or die("Couldn't Connect");

mysqli_select_db($con, $db) or die ("Couldn't Find Database"); 

?>
<?php 
$db_host = "localhost";
$db_name = "flinoid_db";
$db_user = "root";
$db_pass = "flinoid2020$$";
$conn= mysqli_connect($db_host,$db_user,$db_pass,$db_name);
mysqli_select_db($conn,$db_name);
?>

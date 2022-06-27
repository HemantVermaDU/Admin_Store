<?php 
include("check.php");
include("connect.php");

$add_id=mysqli_real_escape_string($conn,$_POST['add_id']);
$name=mysqli_real_escape_string($conn,$_POST['name']);
$value=mysqli_real_escape_string($conn,$_POST['value']);

 $display = "INSERT INTO `settings`(`name`,`value`) VALUES ('$name','$value')";
   $query = mysqli_query($conn, $display);

?>



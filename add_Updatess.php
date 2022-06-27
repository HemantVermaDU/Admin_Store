<?php 
include("check.php");
include("connect.php");

$add_ids=$_POST['add_ids'];
 $state_name = $_POST['state_name'];
    $state_code = $_POST['state_code'];
     $state_short_name = $_POST['state_short_name'];


 $display = "INSERT INTO `state_code`(`state_name`,`state_code`,`state_short_name`) VALUES ('$state_name','$state_code','$state_short_name')";
   $query = mysqli_query($conn, $display);

?>



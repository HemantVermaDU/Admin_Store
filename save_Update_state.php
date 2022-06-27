<?php 
include("check.php");
include("connect.php");

$edit_id=$_POST['edit_id'];
$state_name=$_POST['state_name'];
$state_code=$_POST['state_code'];
$state_short_name=$_POST['state_short_name'];

$sqln="UPDATE state_code SET state_name ='$state_name',state_code ='$state_code',state_short_name='$state_short_name' WHERE id='".$edit_id."'";
$result = mysqli_query($conn ,$sqln); 

?>



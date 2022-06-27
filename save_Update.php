<?php 
include("check.php");
include("connect.php");

$edit_id=$_POST['edit_id'];
$name=$_POST['name'];
$value=$_POST['value'];

$sqln="UPDATE settings SET value ='".$value."' WHERE id='".$edit_id."'";
$result = mysqli_query($conn ,$sqln); 

?>



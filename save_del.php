<?php 
include("check.php");
include("connect.php");

$del_id = $_POST['del_id'];

$sql = "delete from settings where id='$del_id'";

$result=mysqli_query($conn, $sql);
?>
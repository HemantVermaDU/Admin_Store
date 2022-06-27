<?php 
include("check.php");
include("connect.php");

$del_idss = $_POST['del_idss'];

$sql = "delete from state_code where id='$del_idss'";

$result=mysqli_query($conn, $sql);
?>
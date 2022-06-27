<?php 
include("check.php");
include("connect.php");

$del_idqq = $_POST['del_idqq'];

$sql = "delete from item_unit where id='$del_idqq'";

$result=mysqli_query($conn, $sql);
?>
<?php 
include("check.php");
include("connect.php");

$edit_id=$_POST['edit_id'];
$item_unit=$_POST['item_unit'];

$sqln="UPDATE item_unit SET item_unit ='".$item_unit."' WHERE id='".$edit_id."'";
$result = mysqli_query($conn ,$sqln); 


?>



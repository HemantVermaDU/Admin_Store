<?php 
include("check.php");
?>
<?php 
include("connect.php");

$add_idq=$_POST['add_idq'];
$item_unit=$_POST['item_unit'];

 $display = "INSERT INTO `item_unit`(`item_unit`) VALUES ('$item_unit')";
   $query = mysqli_query($conn, $display);

?>



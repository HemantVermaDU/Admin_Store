<?php 
include("check.php");
?>
<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE message SET status=1 WHERE status=0";
  mysqli_query($conn, $update_query);
 }
 $query = "SELECT * FROM message ORDER BY id DESC LIMIT 5";
 $result = mysqli_query($conn, $query);
 $output = '';
 
}
?>

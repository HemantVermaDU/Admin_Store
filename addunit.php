<?php 
include("check.php");
include("connect.php");
?>
<?php 

if(isset($_POST['submit'])) {

  $item_unit =mysqli_real_escape_string($conn,$_POST['item_unit']);
 
     $result = "INSERT INTO item_unit(`item_unit`) VALUES ('$item_unit')";

     $query = mysqli_query($conn, $result);

         echo '<script>alert("added unit Successfully ")</script>';
      echo "<script> window.location.href='Setting.php';</script>";
        }
 ?>
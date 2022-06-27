<?php 
include("check.php");
include("header.php");
include("connect.php");

if(isset($_POST['submit'])){

 $id = $_POST['id'];
  

     $q = "INSERT INTO `stores`(`store_id`) VALUES ('$store_id')";

     $query = mysqli_query($conn,$q);
  
      echo '<script>alert("item added")</script>';
       echo "<script> window.location.href='items.php';</script>";
  }
}
 ?>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Edit Store ID</h4>
                </div>
                <div>  
                </div>
              </div>
            </div>
          </div>
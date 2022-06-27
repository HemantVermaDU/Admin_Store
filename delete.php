<?php 
include("check.php");
include("header.php");
     if(isset($_GET['id']))
     {
         $id= $_GET['id'];
         $query = "DELETE FROM  category WHERE id = {$id}"; 
         $delete_query= mysqli_query($conn, $query);
         
           if (!$delete_query) {
              echo "something went wrong ".mysqli_error($conn);
          }
          else {
             echo "<script> window.location.href='Category.php';</script>";
              }  
     }  
              ?>
<?php 
include("check.php");
include("header.php");
     if(isset($_GET['delete']))
     {
         $id= $_GET['delete'];
         $query = "DELETE FROM item WHERE id = {$id}"; 
         $delete_query= mysqli_query($conn, $query);
         
           if (!$delete_query) {
              echo "something went wrong ".mysqli_error($conn);
          }
          else {
             echo "<script> window.location.href='item.php';</script>";
              }  
     }  
              ?>
<?php
include("check.php");
include("connect.php");
if(isset($_POST['checking_viewbtn']))
{
    $s_id =$_POST['student_id'];

    // echo  $return = $s_id;


  $displayquery = "select * from staff WHERE id=$s_id";

  $queryd = mysqli_query($conn , $displayquery);

  if(mysqli_num_rows($queryd) > 0) 
{
foreach($queryd as $row) 
{ 

    echo $return = '
     <h5>username : '.$row['username'].'</h5>
     <h5>password : '.$row['password'].'</h5>
      ';
}
}
else{
  echo $return =  "No record found";
}
}
?>
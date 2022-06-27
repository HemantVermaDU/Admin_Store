<?php 
session_start();
include("connect.php");
if(isset($_POST['btn']))
{ 
    $pass=mysqli_real_escape_string($conn,$_POST['password']);
     $username=mysqli_real_escape_string($conn,$_POST['username']);

     $passw = md5($pass);
      
   $sql="SELECT * FROM admin WHERE username='$username' and password='$passw'";

    $result=$conn->query($sql);

if($result && mysqli_num_rows($result) == 1)
{
  $row = $result->fetch_assoc();
 
  $_SESSION['last_login'] = $row['last_login'];
  $_SESSION['id']= $row['id']; 
		$_SESSION['username']=$row['username']; 
		 
		 $today = date("Y-m-d H:i:s");

  $sql1="UPDATE admin set last_login='$today' where id='".$_SESSION['id']."'";
 $resultn=mysqli_query($conn,$sql1);

 header("location:home");
}
else
{
	 echo '<script>alert("Invalid Username And Password")</script>';
      echo "<script> window.location.href='index';</script>";
}
	?>	
	<?php
}
?>
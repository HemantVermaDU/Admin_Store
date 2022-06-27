<?php 
include("check.php");
include("connect.php");
 
 sleep(1); 

 if(isset($_POST['id'])){
// $id =mysqli_real_escape_string($conn,$_POST['id']);
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $contact_number =mysqli_real_escape_string($conn,$_POST['contact_number']);
  $status = mysqli_real_escape_string($conn,$_POST['status']);
    $location = mysqli_real_escape_string($conn,$_POST['location']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $gst = mysqli_real_escape_string($conn,$_POST['gst']);
     $start_year = mysqli_real_escape_string($conn,$_POST['start_year']); 
      $end_year = mysqli_real_escape_string($conn,$_POST['end_year']); 

$emailquery = "select * from store where email='$email'";
$query=mysqli_query($conn,$emailquery);
$emailcount =mysqli_num_rows($query);
if($emailcount>0){
  echo "Email Already Exist";
}
$gstquery = "select * from store where gst='$gst'";
$gstquery=mysqli_query($conn,$gstquery);
$gstcount =mysqli_num_rows($gstquery);
if($gstcount>0){
echo "GST number Already Exist";
}
else{
$checkeduid ="select * from store ORDER BY id DESC LIMIT 1";
$checkresult = mysqli_query($conn , $checkeduid);
if(mysqli_num_rows($checkresult)>0)
{


     $q = "INSERT INTO `store`(`name`,`contact_number`,`status`,`location`,`start_year`,`end_year`,`email`,`gst`) VALUES ('$name','$contact_number','$status','$location','$start_year','$end_year','$email','$gst')";
     $query = mysqli_query($conn,$q);

     if($query)
     {
            echo "Store Added Successfully";
             // echo "<script> window.location.href='storelist.php';</script>";
     }else{
        echo "Error";
     }
   }
        else{
          $id ="1"; 
           $q = "INSERT INTO `store`(`id`,`name`,`contact_number`,`status`,`location`,`start_year`,`end_year`,`email`,`gst`) VALUES ('$id','$name','$contact_number','$status','$location','$start_year','$end_year','$email','$gst')";
     $query = mysqli_query($conn,$q);

     if ($query) {
          echo "Store Added Successfully";
      // echo '<script>alert("Store added Successfully")</script>';
      // echo "<script> window.location.href='storelist.php';</script>";
     }else{
       // echo '<script>alert(" ERROR ")</script>';
         echo "Error";
     }

        }}}
 ?>

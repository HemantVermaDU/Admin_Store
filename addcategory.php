<?php 
include("check.php");
include("header.php");
include("connect.php");
if(isset($_POST['btn']))
{
  $name =mysqli_real_escape_string($conn,$_POST['name']);
   $status =mysqli_real_escape_string($conn,$_POST['status']);

   $timestamp=date("Y-m-d H:i:s");
      $Message="added - category : ".$name ;

  $namequery = "select * from category where name='$name'";
$query=mysqli_query($conn,$namequery);
$namecount =mysqli_num_rows($query);
if($namecount>0){
  echo '<script>alert("Category Already Exist ")</script>';
}else{

  $ppic = $_FILES["profilepic"]["name"];
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
$allowed_extensions = array(".jpg",".JPG","jpeg",".png");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png / format allowed');</script>";
}
if($_FILES["profilepic"]["size"] > 500000) {
    echo '<script>alert("Image size exceeds 500kb")</script>';
        }
else
{
$imgnewfile=md5($ppic).time().$extension;
move_uploaded_file($_FILES["profilepic"]["tmp_name"],'upload/'.$imgnewfile);

     $q = "INSERT INTO `category`(`image`,`name`,`status`) VALUES ('$imgnewfile', '$name','$status')";

     $query = mysqli_query($conn,$q); 

       $Message_update="INSERT INTO activity_log(Message,timestamp) VALUES ('$Message','$timestamp')";
      $update_user=mysqli_query($conn,$Message_update);

   if ($query) {
echo "<script>alert('You have successfully inserted');</script>";
echo "<script type='text/javascript'> document.location ='Category.php'; </script>";
} else{
echo "<script>alert('Something Went Wrong. Please try again');</script>";
}}
}}
?>

     <style type="text/css">
  .required:after{
    content:"*";
    color: red;
  }
</style>
 <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Add Category</h3>
                </div>
                <div> 
                        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item"><a href="Category">Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
  </ol>
</nav>            
                </div>
              </div>
            </div>
          </div>       
<div class="col-md-6">
<form action="" role="form" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="required">Category</label>
          <div class="form-group">
            <div class="col-sm-9">
    <input type="file" class="form-control" required="true" name="profilepic" id="upload_file" onchange="getImagePreview(event)">
    <span style="color:red; font-size:12px;">Only jpg / jpeg/ png / format , less than 500kb allowed.</span>
  </div>
   <div id="preview"></div>
   </div></div></div>
   
    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class=" required">Category Name</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" required name="name" pattern="[a-zA-Z\s]{1,35}" placeholder="Ex@ Mobile,Laptop ">
    </div></div></div></div>

                   <div class="row">
  <div class="col-md-6">
      <div class="form-group row">
      <label class=" required">Status</label>
       <div class="col-sm-9">
  <select class="form-select" name="status" required aria-label="Default select example">
  <option value="1">Active</option>
  <option value="2">Inactive</option>
</select>
</div></div></div>
        <div class="col-lg-12">
       <button type="submit" class="btn btn-success text-white" name="btn"> Add </button>
        <a href="home" class="btn btn-default" role="button">Cancel</a>
    </div>
</form>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  function getImagePreview(event){
    var image=URL.createObjectURL(event.target.files[0]);
     var imagediv = document.getElementById('preview');
     var newimg = document.createElement('img');
     imagediv.innerHTML='';
     newimg.src=image;
     newimg.width="100";
     imagediv.appendChild(newimg);
  }

</script>
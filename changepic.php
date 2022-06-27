<?php 
include("check.php");
include("header.php");
?>
<?php
include("connect.php");
if(isset($_POST['submit']))
  {
  $uid=mysqli_real_escape_string($conn,$_GET['id']);
  $ppic=$_FILES["profilepic"]["name"];
  $oldppic=mysqli_real_escape_string($conn,$_POST['oldpic']);
$oldprofilepic="upload"."/".$oldppic;
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
$allowed_extensions = array(".jpg",".JPG","jpeg",".png");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if($_FILES["profilepic"]["size"] > 500000) {
    echo '<script>alert("Image size exceeds 500kb")</script>';
        }
else
{
$imgnewfile=md5($oldprofilepic).time().$extension;
move_uploaded_file($_FILES["profilepic"]["tmp_name"],'upload/'.$imgnewfile);
     $query=mysqli_query($conn,"update category set image='$imgnewfile' where id='$uid' ");
    if ($query) {
    	unlink($oldprofilepic);
    echo "<script>alert('Category image updated successfully');</script>";
    echo "<script type='text/javascript'> document.location ='Category'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <style type="text/css">
  .required:after{
    content:"*";
    color: red;
  }
</style>
</head>
<body>
	  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Update Category Image
</h3>
                </div>
                <div>
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">change image</li>
  </ol>
</nav>  
                </div>
              </div>
            </div>
          </div>

<div class="signup-form">
    <form  method="POST" enctype="multipart/form-data">
 <?php
$eid=$_GET['id'];
$ret=mysqli_query($conn,"select * from category where id='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
<input type="hidden" name="oldpic" value="<?php echo $row['image'];?>">
	<div class="form-group">
<img src="upload/<?php echo $row['image'];?>" width="120" height="120">
		</div>
 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Select Image</label>
                          <div class="col-sm-9">
    <input type="file" class="form-control" name="profilepic" onchange="getImagePreview(event)" required="true">
        	<span style="color:red; font-size:12px;">Only jpg / jpeg/ png / format, less than 500kb allowed.</span>
    </div></div></div></div>

 <div id="preview"></div><br>
       
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-xm btn-block text-white" name="submit">Update</button>
            <a href="Category" class="btn btn-default" role="button">Cancel</a>
        </div>
              <?php 
}?>
    </form>

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
</body>
</html>
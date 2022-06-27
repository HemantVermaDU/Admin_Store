<?php 
include("check.php");
?>
  <?php
include("header.php");
include("connect.php");

if(isset($_POST['btn'])){

  $files = $_FILES['file'];
  $remarks = $_POST['remarks'];

   $timestamp=date("Y-m-d H:i:s");
      $Message="added - report :";

  $filename = $files['name'];
  $fileerror = $files['error'];
  $filetmp = $files['tmp_name'];

  $fileext = explode('.',$filename);

  $filecheck = strtolower(end($fileext));

  $fileextstored = array('png','jpg','jpeg','pdf');

  if (in_array($filecheck,$fileextstored)) {

     $destinationfile ='upload/'.$filename;
     move_uploaded_file($filetmp,$destinationfile);

     $q = "INSERT INTO `report`(`image`,`remarks`) VALUES ('$destinationfile','$remarks')";

     $query = mysqli_query($conn,$q); 

       $Message_update="INSERT INTO activity_log(Message,timestamp) VALUES ('$Message','$timestamp')";
      $update_user=mysqli_query($conn,$Message_update);

     echo '<script>alert("Report added Successfully ")</script>';
      echo "<script> window.location.href='report_list.php';</script>";
  }
}
  ?>
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Add Report</h4>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>

<div class="col-md-6">
<form action="" role="form" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="required">Add Report</label>
          <div class="form-group">
 <input type="file" class="form-control-file" required  name="file" id="upload_file">
  </div>
   <div id="preview"></div>
   </div></div>
   
    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label required">Remark</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" required name="remarks" placeholder="Remark">
    </div></div></div></div>

        <div class="col-lg-12">
       <button type="submit" class="btn btn-success text-white" name="btn"> Add </button>
    </div>
</form>
</div>
</div>
</div>
</div>

<!-- <script type="text/javascript">
  function getImagePreview(event){
    var image=URL.createObjectURL(event.target.files[0]);
     var imagediv = document.getElementById('preview');
     var newimg = document.createElement('img');
     imagediv.innerHTML='';
     newimg.src=image;
     newimg.width="100";
     imagediv.appendChild(newimg);
  }

</script> -->


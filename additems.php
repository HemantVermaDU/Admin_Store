<?php 
include("check.php");
?>
<?php 
include("header.php");
include("connect.php");

if(isset($_POST['submit'])){

  $files = $_FILES['file'];
  $name = $_POST['name'];
   $quantity = $_POST['quantity'];
    $buying_price = $_POST['buying_price'];
     $selling_price = $_POST['selling_price'];
      $category_id = $_POST['category_id'];
       $gst = $_POST['gst'];
        $status = $_POST['status'];
         $unit_price_type = $_POST['unit_price_type'];
          $unit_quantity_type = $_POST['unit_quantity_type'];

  $filename = $files['name'];
  $fileerror = $files['error'];
  $filetmp = $files['tmp_name'];
  $fileext = explode('.',$filename);

  $filecheck = strtolower(end($fileext));

  $fileextstored = array('png','jpg','jpeg');

  if (in_array($filecheck,$fileextstored)) {

     $destinationfile ='upload/'.$filename;
     move_uploaded_file($filetmp,$destinationfile);

     $q = "INSERT INTO `item`(`image`,`name`,`quantity`,`buying_price`,`selling_price`,`category_id`,`gst`,`status`,`unit_price_type`,`unit_quantity_type`) VALUES ('$destinationfile','$name','$quantity',' $buying_price','$selling_price','$category_id','$gst','$status','$unit_price_type','$unit_quantity_type')";

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
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Add Item</h3>
                </div>
                <div>
                  
                </div>
              </div>
            </div>
          </div>

 <div class="row">   
<div class="col-md-6">
<form action="" role="form" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Add Item</label>
          <div class="form-group ">
    <input type="file" class="form-control-file"  name="file" id="upload_file" onchange="getImagePreview(event)">
    <div id="preview"></div>
  </div>
</div></div>

 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="name" placeholder="Enter Name">
    </div></div></div>
<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Quantity</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="quantity" placeholder="quantity">
    </div></div>
  </div></div>
   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Buying Price</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="buying_price" placeholder="buying_price">
    </div></div></div>
      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Selling Price</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="selling_price" placeholder="selling_price">
    </div></div>
  </div></div> 
  <div class="row">
         <div class="col-md-6">
        <div class="form-group row">
        <label class="col-sm-3 col-form-label">Select Category</label>
 <div class="col-sm-9">
    <select  name="category_id" class="form-control" id="category_id">
<?php
     $sql = ("SELECT * FROM  category where id");
     $result = mysqli_query($conn, $sql);
     
     echo "<option value=''>Select</option>";
 while ($row = mysqli_fetch_assoc($result)){ ?>
        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>";
      <?php } ?>                       
?></select></div></div></div>

  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description </label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="description" placeholder="description">
    </div></div>
  </div></div> 

   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">GST</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="gst" placeholder="GST">
    </div></div></div>
      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="status" placeholder="status">
    </div></div>
  </div></div> 

   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Unit Price Type</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="unit_price_type" placeholder="unit_price_type">
    </div></div></div>
      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Unit Quantity Type</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="unit_quantity_type" placeholder="unit_quantity_type">
    </div></div>
  </div></div> 

        <div class="col-lg-12">
       <button type="submit" class="btn btn-success" name="submit"> Submit </button>
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
     newimg.width="80";
      newimg.height="80";
     imagediv.appendChild(newimg);
  }

</script>
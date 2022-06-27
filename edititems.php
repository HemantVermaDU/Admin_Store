<?php 
include("check.php");
include("header.php");
include("connect.php");
 ?>
<?php
   if(isset($_GET['id']))
    {
      $id = $_GET['id']; 
    }
      $query="SELECT * FROM item WHERE id = $id";
      $view_users= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_users))
        {
           $id = $row['id'];
            $store_id = $row['store_id'];
           $image = $row['image'];
          $name = $row['name'];
          $quantity = $row['quantity'];
          $buying_price = $row['buying_price'];
          $selling_price = $row['selling_price'];
          $category_id = $row['category_id'];
           $description = $row['description'];
 $gst = $row['gst'];
 $status = $row['status'];
 $item_unit = $row['item_unit'];

        }

    if(isset($_POST['submit'])) 
    {
       
  $files = $_FILES['file'];
  $name = $_POST['name'];
   $quantity = $_POST['quantity'];
    $buying_price = $_POST['buying_price'];
     $selling_price = $_POST['selling_price'];
      $category_id = $_POST['category_id'];
       $gst = $_POST['gst'];
        $status = $_POST['status'];
         $item_unit = $_POST['item_unit'];
       

           $timestamp=date("Y-m-d H:i:s");
      $Message="UPDATED - item :";

  $filename = $files['name'];
  $fileerror = $files['error'];
  $filetmp = $files['tmp_name'];

  $fileext = explode('.',$filename);

  $filecheck = strtolower(end($fileext));

  $fileextstored = array('png','jpg','jpeg');

  if (in_array($filecheck,$fileextstored)) {

     $destinationfile ='upload/item_images/'.$filename;
     move_uploaded_file($filetmp,$destinationfile);
     
      $query = "UPDATE item SET image = '$destinationfile' , name = '$name', quantity='$quantity',buying_price = '$buying_price',selling_price = '$selling_price',category_id='$category_id',gst='$gst', status='$status', item_unit='$item_unit' WHERE id = $id";

      $update_user = mysqli_query($conn, $query);

        $Message_update="INSERT INTO activity_log(Message,timestamp) VALUES ('$Message','$timestamp')";
      $update_user=mysqli_query($conn,$Message_update);

      echo "<script type='text/javascript'>alert('item updated successfully!')</script>";
       echo "<script> window.location.href='item.php';</script>";
    } }            
?>

<style type="text/css">
  .required:after{
    content:"*";
    color: red;
  }
</style>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0 " style="color:#191978;">Edit Item</h3>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>

           
<div class="col-md-6">
<form action="" role="form" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="required">Select Item Image</label>
          <div class="form-group ">
    <input type="file" class="form-control-file" name="file" id="upload_file" onchange="getImagePreview(event)">
    <div id="preview"></div>
  </div></div>
</div>

 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class=" required">Name</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="name" value="<?php echo $name ?>" required placeholder="Enter Name">
    </div></div></div>
<div class="col-md-6">
                        <div class="form-group row">
                          <label class=" required">Quantity</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="quantity" value="<?php echo $quantity ?>" required placeholder="quantity">
    </div></div>
  </div></div>
   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class=" required">Buying Price</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="buying_price" value="<?php echo $buying_price ?>" required placeholder="buying_price">
    </div></div></div>
      <div class="col-md-6">
                        <div class="form-group row">
                          <label class=" required">Selling Price</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="selling_price" value="<?php echo $selling_price ?>" required placeholder="selling_price">
    </div></div>
  </div></div> 
  <div class="row">
         <div class="col-md-6">
        <div class="form-group row">
        <label class=" required">Select Category</label>
 <div class="col-sm-9">
    <select  name="category_id" class="form-control" required id="category_id">
<?php
     $sql = ("SELECT * FROM  category where id");
     $result = mysqli_query($conn, $sql);
     
     echo "<option disabled>Select</option>";
 while ($row = mysqli_fetch_assoc($result)){ ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>";
      <?php } ?>                       
?></select></div></div></div>

  <div class="col-md-6">
                        <div class="form-group row">
                          <label class=" required">Description </label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="description" value="<?php echo $description ?>" required placeholder="description">
    </div></div>
  </div></div> 

   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="">GST</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="gst" value="<?php echo $gst."%" ?>" required placeholder="EX @ 18%">
    </div></div></div>
      <div class="col-md-6">
                        <div class="form-group row">
                          <label class=" required">Status</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="status" value="<?php echo $status ?>" required placeholder="status">
    </div></div>
  </div></div> 

   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class=" required">Item Unit</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="item_unit" required value="<?php echo $item_unit ?>" placeholder="item_unit">
    </div></div></div>
     </div> 

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
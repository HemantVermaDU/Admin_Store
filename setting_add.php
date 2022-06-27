<?php
include("check.php");
include("connect.php");
if(isset($_POST['add_id']))
{
   $name = $_POST['name'];
   $value = $_POST['value'];

  $display = "INSERT INTO `settings`(`name`,`value`) VALUES ('$name','$value')";

  $query = mysqli_query($conn, $display);

}
?>

<input type="hidden" class="form-control" id="add_id" name="add_id">


 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
 <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
  </div></div></div></div>
   <div class="row">
  <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Value</label>
                          <div class="col-sm-9">
 <input type="text" class="form-control" id="value" placeholder="Enter Value" name="value">
</div></div></div></div>
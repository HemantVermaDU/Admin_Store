<?php
include("check.php");
include("connect.php");
if(isset($_POST['add_ids']))
{
  
   $state_name = $_POST['state_name'];
    $state_code = $_POST['state_code'];
     $state_short_name = $_POST['state_short_name'];

  $display = "INSERT INTO `state_code`(`state_name`,`state_code`,`state_short_name`) VALUES ('$state_name','$state_code','$state_short_name')";

  $query = mysqli_query($conn, $display);

}
?>

<input type="hidden" class="form-control" id="add_ids" name="add_ids">
   <div class="row">
  <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">state name</label>
                          <div class="col-sm-9">
 <input type="text" class="form-control" id="state_name" placeholder="Enter State Name" name="state_name">
</div></div></div></div>
<div class="row">
  <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">state code</label>
                          <div class="col-sm-9">
 <input type="text" class="form-control" id="state_code" placeholder="Enter State Code" name="state_code">
</div></div></div></div>
<div class="row">
  <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">State Short Name</label>
                          <div class="col-sm-9">
 <input type="text" class="form-control" id="state_short_name" placeholder="Enter State short Name" name="state_short_name">
</div></div></div></div>
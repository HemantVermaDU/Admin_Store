<?php
include("check.php");
include("connect.php");
if(isset($_POST['edit_id']))
{
    $id = $_POST['edit_id'];

  $display = "select * from state_code WHERE id=$id";

  $query = mysqli_query($conn, $display);

while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $state_name= $row['state_name'];
   $state_code= $row['state_code'];
    $state_short_name= $row['state_short_name'];
}
}
?>

<input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?php echo $id ?>">


 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label required">State Name</label>
                          <div class="col-sm-9"> 

 <input type="text" class="form-control" id="state_name" name="state_name" value="<?php echo $state_name ?>">
 </div></div></div></div>

  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label required">State Code</label>
                          <div class="col-sm-9"> 
  <input type="text" class="form-control" id="state_code" name="state_code" value="<?php echo $state_code ?>">
   </div></div></div></div>
     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label required">State short Name</label>
                          <div class="col-sm-9">
   <input type="text" class="form-control" id="state_short_name" name="state_short_name" value="<?php echo $state_short_name ?>">
    </div></div></div></div>

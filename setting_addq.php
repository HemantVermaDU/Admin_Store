<?php
include("check.php");
include("connect.php");
if(isset($_POST['add_idq']))
{
   // $name = $_POST['name'];
   $item_unit = $_POST['item_unit'];

  $display = "INSERT INTO `item_unit`(`item_unit`) VALUES ('$item_unit')";

  $query = mysqli_query($conn, $display);

}
?>

<input type="hidden" class="form-control" id="add_idq" name="add_idq">


   <div class="row">
  <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Value</label>
                          <div class="col-sm-9">
 <input type="text" class="form-control" id="item_unit" placeholder="Enter Value" name="item_unit">
</div></div></div></div>
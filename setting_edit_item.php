<?php
include("check.php");
include("connect.php");
if(isset($_POST['edit_id']))
{
    $id = $_POST['edit_id'];

  $display = "select * from item_unit WHERE id=$id";

  $query = mysqli_query($conn, $display);

while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $item_unit= $row['item_unit'];
}
}
?>

<input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?php echo $id ?>">
 <input type="text" class="form-control" id="item_unit" name="item_unit" value="<?php echo $item_unit ?>">

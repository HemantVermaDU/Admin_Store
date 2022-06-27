<?php
include("check.php");
include("connect.php");
if(isset($_POST['edit_id']))
{
    $id = $_POST['edit_id'];

  $display = "select * from settings WHERE id='$id'";

  $query = mysqli_query($conn, $display);

while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $name= $row['name'];
  $value = $row['value'];
}
}
?>

<input type="hidden" class="form-control" id="edit_id" name="edit_id" value="<?php echo $id ?>">
 <input type="text" class="form-control" id="value" name="value" value="<?php echo $value ?>">

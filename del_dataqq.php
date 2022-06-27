<?php
include("check.php");
include("connect.php");
if(isset($_POST['del_idqq']))
{
    $id = $_POST['del_idqq'];

  $display = "select * from item_unit WHERE id='$id'";

  $query = mysqli_query($conn, $display);

while($row = mysqli_fetch_array($query)){
  $id = $row['id'];

}
}
?>

<input type="hidden" class="form-control" id="del_idqq" name="del_idqq" value="<?php echo $id ?>">
<p>Do you want to delete this  reord?</p>

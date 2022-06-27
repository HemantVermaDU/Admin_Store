<?php
include("check.php");
include("connect.php");
if(isset($_POST['del_id']))
{
    $id = $_POST['del_id'];

  $display = "select * from settings WHERE id='$id'";

  $query = mysqli_query($conn, $display);

while($row = mysqli_fetch_array($query)){
  $id = $row['id'];

}
}
?>

<input type="hidden" class="form-control" id="del_id" name="del_id" value="<?php echo $id ?>">
<p>Do you want to delete this  reord?</p>

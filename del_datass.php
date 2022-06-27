<?php
include("check.php");
include("connect.php");
if(isset($_POST['del_idss']))
{
    $id = $_POST['del_idss'];

  $display = "select * from state_code WHERE id='$id'";

  $query = mysqli_query($conn, $display);

while($row = mysqli_fetch_array($query)){
  $id = $row['id'];

}
}
?>

<input type="hidden" class="form-control" id="del_idss" name="del_idss" value="<?php echo $id ?>">
<p>Do you want to delete this reord?</p>

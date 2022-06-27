<?php 
include("check.php");
?>
<?php 
include("header.php");
include("connect.php");
$displayquery = "select * from account";
$querydisplay = mysqli_query($conn , $displayquery);
 ?>

 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">List of Accounts</h4>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
 <div class="page-body">
<div class="card">
<div class="card-header">
    <div class="col-sm-10">
        <a href="account.php"><button class="btn btn-primary pull-right text-white">+Add Account</button></a>
    </div>
</div></div><br>
<div class="card">
<div class="card-block">
<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap text-center">
<thead>
                <tr>  <th>id</th>
                   <th>username</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>State Code</th>
                    <th>Action</th>

                </tr>
                  </thead>
                <tbody>            
<?php
foreach ($querydisplay as $row3) {
  $id = $row3['id'];
  ?>
  <tr>
    <td>
   <?php echo $row3['id'];?>
   </td>
    <td>
   <?php echo $row3['username'];?>
   </td>
   <td>
   <?php echo $row3['email'];?>
   </td>
     <td>
   <?php echo $row3['mobile'];?>
   </td>
    <td>
   <?php echo $row3['address'];?>
   </td>
    <td>
   <?php echo $row3['state'];?>
   </td>
    <td>
   <?php echo $row3['state_code'];?>
   </td>
   <td>  
      <?php echo "<a href='deleteaccount.php?id=$id'"?> onclick="return confirm('Are you sure to delete this record?')">  <input id="delete" type="submit" name="delete" value="Delete" class="btn btn-danger text-white" /></a>  
        </td>
      </tr>
<?php 
}
?>    
  </tbody>
   </table>
    </<div>
  </div>


<?php 
include("check.php"); 
include("header.php");
include("connect.php");
 ?>
 <?php
   if(isset($_GET['id']))
    {
      $id = $_GET['id']; 
    }
      $query="SELECT * FROM staff WHERE id = $id";
      $view_users= mysqli_query($conn,$query);
      while($row = mysqli_fetch_assoc($view_users))
        {
           $name = $row['name'];
           $mobile = $row['mobile'];
           $staff_type = $row['staff_type'];
           $username = $row['username'];
          $password = $row['password'];
        }

    if(isset($_POST['submit'])) 
    {
     $name =mysqli_real_escape_string($conn,$_POST['name']);
   $mobile =mysqli_real_escape_string($conn,$_POST['mobile']);
    $staff_type =mysqli_real_escape_string($conn,$_POST['staff_type']);
     $username =mysqli_real_escape_string($conn,$_POST['username']); 
      $password =mysqli_real_escape_string($conn,$_POST['password']);  
     
      $query = "UPDATE staff SET name = '$name',mobile = '$mobile',staff_type='$staff_type',username ='$username',password ='$password' WHERE id = $id";

      $update_user = mysqli_query($conn, $query);

       $timestamp=date("Y-m-d H:i:s");
      $Message="UPDATED - staff : " .$name;

      $Message_update="INSERT INTO activity_log(Message,timestamp) VALUES ('$Message','$timestamp')";
      $update_user=mysqli_query($conn,$Message_update);

      echo "<script type='text/javascript'>alert('staff updated successfully!')</script>";
       echo "<script> window.location.href='staff.php';</script>";
    }           
?>
     <style type="text/css">
  .required:after{
    content:"*";
    color: red;
    padding: 5px;
  }
</style>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Edit Staff</h3>
                </div>
                <div>
                   <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item"><a href="staff">Staff</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
  </ol>
</nav>
                </div>
              </div>
            </div>
          </div>

<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form action="" method="post" class="form-sample">
                    <p class="card-description">
                      Edit Staff
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" pattern="[a-zA-Z\s]{1,35}" value="<?php echo $name ?>" required placeholder="Enter Name" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Mobile Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" pattern="[0-9]{10}" value="<?php echo $mobile ?>" minlength="10" maxlength="10" name="mobile" required placeholder="Contact number" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
      <div class="form-group row">
      <label class="required">staff_type</label>
       <div class="col-sm-9">
  <select class="form-select" name="staff_type" required aria-label="Default select example">
  <option selected><?php echo $staff_type ?></option>
  <option value="1">Sale</option>
  <option value="2">Purchase</option>
</select>
</div></div></div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">username</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" name="username" value="<?php echo $username ?>" required placeholder=" Ex @gmailcom" />
                          </div>
                        </div>
                      </div> </div>
                         <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" value="<?php echo $password ?>" name="password" required placeholder="Enter Password" />
                          </div>
                        </div>
                      </div></div>
                     <button type="submit" class="btn btn-primary text-white" name="submit">Submit</button>
                     <a href="staff" class="btn btn-default" role="button">Cancel</a>
                   </form>
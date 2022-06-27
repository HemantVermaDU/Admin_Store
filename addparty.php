<?php 
include("check.php"); 
include("header.php");
include("connect.php");

if(isset($_POST['submit'])){

  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $store_name = mysqli_real_escape_string($conn,$_POST['store_name']);
   $password = mysqli_real_escape_string($conn,$_POST['password']);
    $location = mysqli_real_escape_string($conn,$_POST['location']);
     $start_year = mysqli_real_escape_string($conn,$_POST['start_year']); 
      $end_year = mysqli_real_escape_string($conn,$_POST['end_year']); 

      $checkeduid = "select * from `stores` ORDER BY id DESC LIMIT 1";
    $checkresult = mysqli_query($conn,$checkeduid);
    if(mysqli_num_rows($checkresult))
    {

      if($row = mysqli_fetch_assoc($checkresult)){

        $uid = $row['store_id'];

        $get_numbers = str_replace("ST", "", $uid);
        $id_increase = $get_numbers+1;
        $get_string = str_pad($id_increase,5,0, STR_PAD_LEFT);
        $id= "ST".$get_string;


     $q = "INSERT INTO `stores`(`store_id`,`username`,`email`,`store_name`,`password`,`location`,`start_year`,`end_year`) VALUES ('$id','$username', '$email','$store_name','$password','$location','$start_year','$end_year')";

     $query = mysqli_query($conn,$q);

      if ($query) {
           echo '<script>alert("Store added ")</script>';
      echo "<script> window.location.href='storelist.php';</script>";
        }
        else{
         echo '<script>alert("Error ")</script>';
        }
      }
    }

      else{
      $id ="ST00001";
    $q = "INSERT INTO `stores`(`store_id`,`username`,`email`,`store_name`,`password`,`location`,`start_year`,`end_year`) VALUES ('$id','$username', '$email','$store_name','$password','$location','$start_year','$end_year')";
        $query = mysqli_query($conn,$q);
        if ($query) {
         echo '<script>alert("Store added ")</script>';
          echo "<script> window.location.href='storelist.php';</script>";
        }
        else{
          echo '<script>alert("Error ")</script>';
        }
} }
 ?>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Add Store</h4>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>

<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form action="" method="post" class="form-sample">
                    <p class="card-description">
                      Personal info
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" required placeholder="Enter Username" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" required placeholder="Ex@gmail.com" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Store Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="store_name" required placeholder="Store name" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" required placeholder="Enter Password" />
                          </div>
                        </div>
                      </div>
                   </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Location</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="location" required placeholder="Location" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Start Financial Year</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="start_year" required placeholder="Ex - 2022" />
                          </div>
                        </div>
                      </div>
                   </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End Financial Year</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="end_year" required placeholder=" Ex - 2030" />
                          </div>
                        </div>
                      </div></div>
                     <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                   </form>
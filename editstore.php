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
      $query="SELECT * FROM store WHERE id = $id";
      $view_users= mysqli_query($conn,$query);
      while($row = mysqli_fetch_assoc($view_users))
        {
           $name = $row['name'];
           $contact_number = $row['contact_number'];
           $status = $row['status'];
           $location = $row['location'];
           $start_year = $row['start_year'];
            $end_year = $row['end_year'];
        }
    if(isset($_POST['submit'])) 
    {     
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $contact_number = mysqli_real_escape_string($conn,$_POST['contact_number']);
  $status = mysqli_real_escape_string($conn,$_POST['status']);
    $location = mysqli_real_escape_string($conn,$_POST['location']);
     $start_year = mysqli_real_escape_string($conn,$_POST['start_year']); 
      $end_year = mysqli_real_escape_string($conn,$_POST['end_year']);

       $timestamp=date("Y-m-d H:i:s");
      $Message="UPDATED - Store :";
     
      $query = "UPDATE store SET name = '$name' ,contact_number = '$contact_number',status = '$status',location='$location',start_year ='$start_year',end_year ='$end_year' WHERE id = $id";

      $update_user = mysqli_query($conn, $query);

      $Message_update="INSERT INTO activity_log(Message,timestamp) VALUES ('$Message','$timestamp')";
      $update_user=mysqli_query($conn,$Message_update);

      echo "<script type='text/javascript'>alert('Store updated successfully!')</script>";
       echo "<script> window.location.href='storelist.php';</script>";
    }           
?>
      <style type="text/css">
  .required:after{
    content:"*";
    color: red;
    padding: 5px;
  }
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Store Edit </h3>
                </div>
                <div>
                    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item"><a href="storelist">Store List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Store</li>
  </ol>
</nav>
                </div>
              </div>
            </div>
          </div>
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form action="" method="post" class="form-sample" >
                    <p class="card-description">
                      Store edit 
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" pattern="[a-zA-Z\s]{1,35}" value="<?php echo $name ?>" required placeholder="Enter Username" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Contact Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="contact_number" pattern="[0-9]{10}" id="mobilecheck"  value="<?php echo $contact_number ?>" required maxlength="10" minlength="10" onkeyup="validation()"  placeholder="Enter Contact number" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
      <div class="form-group row">
      <label class="required">Status</label>
       <div class="col-sm-9">
  <select class="form-select" name="status" required aria-label="Default select example">
  <option selected><?php echo $status ?></option>
  <option value="1">Active</option>
  <option value="2">Inactive</option>
</select>
</div></div></div>
              
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Location</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="location" value="<?php echo $location ?>" required placeholder="Location" />
                          </div>
                        </div>
                      </div> </div>
                       <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Start Year</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="start_year" value="<?php echo $start_year ?>" required placeholder="Ex - 2022" />
                          </div>
                        </div>
                      </div>
                             
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">End Year</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="end_year" value="<?php echo $end_year ?>" required placeholder="Ex - 2025" />
                          </div>
                        </div>
                      </div></div> 
                     <button type="submit" class="btn btn-primary text-white" name="submit">Update</button>
                    <a href="storelist" class="btn btn-default" role="button">Cancel</a>
                   </form>

  <script type="text/javascript">
                              function validation(){
                                var contactcheck = document.getElementById('mobilecheck').value;

                                var contactpattern = /^[0-9]{10}$/ ; 

                                if(contactpattern.test(contactcheck)){
                                  document.getElementById('mobilecheck').style.borderColor = 'green';
                                }else{
                                  document.getElementById('mobilecheck').style.borderColor = 'red';
                                }
                              }
                            </script>



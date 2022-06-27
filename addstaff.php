<?php 
include("check.php");
include("header.php");
include("connect.php");
if(isset($_POST['submit'])){
   $store_id =mysqli_real_escape_string($conn,$_POST['store_id']);
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
   $staff_type = mysqli_real_escape_string($conn,$_POST['staff_type']);
     $username = mysqli_real_escape_string($conn,$_POST['username']); 
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
$emailquery = "select * from staff where username='$username'";
$query=mysqli_query($conn,$emailquery);
$emailcount =mysqli_num_rows($query);
if($emailcount>0){
  echo '<script>alert("Email Already Exist ")</script>';
}
else{
$staffquery = "select * from staff where store_id='$store_id'";
$squery=mysqli_query($conn,$staffquery);
$staffcount =mysqli_num_rows($squery);
if($staffcount>1){
  echo '<script>alert("staff Already Exist ")</script>';
}
else{  

     

 $q = "INSERT INTO `staff`(`store_id`,`name`,`mobile`,`staff_type`,`username`,`password`) VALUES ('$store_id','$name','$mobile','$staff_type','$username','$password')";
     $query = mysqli_query($conn,$q);

      $timestamp=date("Y-m-d H:i:s");
      $Message="added - staff : ".$name;

       $Message_update="INSERT INTO activity_log(Message,timestamp) VALUES ('$Message','$timestamp')";
      $update_user=mysqli_query($conn,$Message_update);

         echo '<script>alert("Staff added Successfully ")</script>';
      echo "<script> window.location.href='staff.php';</script>";
        }}}
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
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Add Staff</h3>
                </div>
                <div>
                          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item"><a href="staff">Staff</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Staff</li>
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
                      Add Staff
                    </p>

                    <div class="row">
         <div class="col-md-6">
        <div class="form-group row">
        <label class="required">Select Store Id</label>
 <div class="col-sm-9">
    <select  name="store_id" class="form-control" required id="store_id">
<?php
     $sql = ("SELECT * FROM store where id");
     $result = mysqli_query($conn, $sql);
     
     echo "<option value=''>...</option>";
 while ($row = mysqli_fetch_assoc($result)){ ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>";
      <?php } ?>                       
?></select></div></div></div></div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Staff Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" pattern="[a-zA-Z\s]{1,35}" required placeholder="Enter Staff Name" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Mobile Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="mobile" pattern="[0-9]{10}" onkeyup="validation()" id="mobilecheck" minlength="10" maxlength="10" required placeholder="Enter mobile Number" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
      <div class="form-group row">
      <label class="required">Staff_type</label>
       <div class="col-sm-9">
  <select class="form-select" name="staff_type" required aria-label="Default select example">
  <option disabled></option>
  <option value="1">sale</option>
  <option value="2">puchase</option>
</select>
</div></div></div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Username</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" name="username" required placeholder="name@example.com" />
                          </div>
                        </div>
                      </div> </div>
                         <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" required placeholder="Enter Password" />
                          </div>
                        </div>
                      </div></div>
                     <button type="submit" class="btn btn-primary text-white" name="submit">Submit</button>
                   <a href="home" class="btn btn-default" role="button">Cancel</a>
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
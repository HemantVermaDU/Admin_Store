<?php 
include("check.php");
include("header.php");
include("connect.php");
 ?>
 <?php
      $query="SELECT * FROM admin WHERE id";
      $view_users= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_users))
        {
           $name = $row['name'];
           $id = $row['id'];
          
        }

    if(isset($_POST['submit'])) 
    {
      $password = md5($_POST['password']); 
       $newpassword = md5($_POST['newpassword']); 
        $rnewpassword = md5($_POST['rnewpassword']); 

   $result_n ="select * from admin where id='$id'";
   $chg_pwd=mysqli_query($conn,$result_n);

    $chg_pwd1=mysqli_fetch_array($chg_pwd);

    $data_pwd=$chg_pwd1['password'];

    if($data_pwd==$password){
    if($newpassword==$rnewpassword){
      $query = "update admin set password='$newpassword' where id='$id'";
      $update_pwd=mysqli_query($conn , $query);
      echo "<script>alert('Update Sucessfully'); window.location='home.php'</script>";
    }
    else{
      echo "<script>alert('Your new and Retype Password is not match'); window.location='profile.php'</script>";
    }
    }
    else
    {
    echo "<script>alert('Your old password is wrong'); window.location='profile.php'</script>";
    }}
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
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Change Password</h3>
                </div>
                <div>
                   <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                     Change Password
                    </p>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label>Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" disabled name="name" value="<?php echo $name ?>" required placeholder="Enter Name" />
                          </div>
                        </div>
                      </div>
                    
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Old Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" required placeholder="Old Password" />
                          </div>
                        </div>
                      </div></div>
                       <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">New Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="newpassword" required placeholder="New password" />
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Confim Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="rnewpassword" required placeholder="Confirm Password " />
                          </div>
                        </div>
                      </div> </div>
                     <button type="submit" class="btn btn-primary text-white" name="submit">Update</button>
                    <a href="home" class="btn btn-default" role="button">Cancel</a>
                   </form>
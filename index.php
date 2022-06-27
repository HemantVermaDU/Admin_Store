<?php
session_start();
if(isset($_SESSION['username']))
{
  header("location:home");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="shortcut icon" href="favicon.png">
  <title>Store Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="admin_icon.png" />
  <style type="text/css"> 
    .auth{
       background-image: url("images/login-bg.jpg");
    }
.auth .register-half-bg {
  background-image: url("register-bg.png");
  background-size: cover;
}
.demo{
  color: #385988;
}
.required:after{
  content:"*";
  color: red;
  padding: 5px;
}
@media (max-width: 576px) {
  .auth .register-half-bg{
    width: 380px;
    height: 300px;
    margin-bottom: auto;
  }
}

  </style> 
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <!-- <div class="brand-logo">
                <img src="icon.png" alt="logo" width="100px" height="100px">
              </div> -->
              <h1 class="demo">Store Admin</h1>
              <form method="POST" action="admin.php" class="pt-3">            
                <div class="form-group">
                  <label class="required">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-email text-primary" style="width:20px;"></i>
                      </span>
                    </div>
                    <input type="email" id="email" name="username" required onkeyup="isEmpty()" class="form-control form-control-lg border-left-0" placeholder="abc@example.com">
                  </div>
                </div>          
                <div class="form-group">
                  <label class="required">Password</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary" style="width:20px;"></i>
                      </span>
                    </div>
                    <input type="password" id="password" name="password" required onkeyup="isEmpty()" class="form-control form-control-lg border-left-0" placeholder="Password"> 
                 <div class="input-group-append bg-transparent">
                <span class="input-group-text bg-transparent border-right-0" onclick="password_show_hide();">
                  <i class="ti-eye" id="show_eye"></i>
                  <i class="ti-eye d-none" id="hide_eye" style="color:blue;"></i>
                </span>
              </div>
                  </div>
                </div>         
                <div class="mt-3">
                  <button name="btn" disabled id="btn" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn text-white">LOG IN</button>
                </div>      
              </form>
            </div>
          </div>
           <div class="col-lg-6 register-half-bg d-flex flex-row">
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
</body>
</html>
<script type="text/javascript">
  function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>

<script type="text/javascript">
  function isEmpty(){

    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    if(email!="" && password!=""){
      document.getElementById("btn").removeAttribute("disabled");
    }
  }
</script>


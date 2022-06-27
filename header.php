<?php
if(!isset($_SESSION['username']))
{
  header("location:index");
}
?>
<?php 
include("connect.php");
$displayquery = "select * from landing_page where id=1";
$querydisplay = mysqli_query($conn , $displayquery);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="favicon.png">
  <title>Store</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="files/stylecolor.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body onload="myfunction()">
<!-- Loading -->
<div id="loading">
</div>
<!-- end Loading -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <?php
foreach ($querydisplay as $row3) {
 }
  ?>
        <a class="navbar-brand brand-logo me-3" href="home"> <img src="upload/<?php echo $row3['logo'];?>" style="width:120px;height:50px;" alt="Image Not Found" /></a>
        <a class="navbar-brand brand-logo-mini" href="home">
        <img src="upload/<?php echo $row3['logo'];?>" style="width:100px;height:50px;" alt="Image Not Found"  /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <form action="search_bar" method="get">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="str" pattern="[a-zA-Z\s]{1,35}" id="navbar-search-input" required placeholder="Search : Party Name" maxlength="35" aria-label="search" aria-describedby="search">
              <button class="search navbar-toggler navbar-toggler align-self-center"  name="submit">Search</button>
               <style type="text/css">
          .navbar-nav .search:hover{
            color: #16307a;
          }
        </style>
            </div>
          </li>
        </ul>     
        </form>
    <?php
   $sql="select count(id) as id9 from message where status='0'";
   $result=mysqli_query($conn,$sql);
   $row=$result->fetch_assoc();
    ?> 
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown me-1">
            <div class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
             <img src="https://img.icons8.com/fluency/48/000000/message-settings.png" width="30px" />
               <span class="count_id" style="color:#193d81; font-size:18px; margin-top:-15px;"><?php echo $row['id9'];?> 
              <ul class="dropdown-menu"></ul>          
              </span>
            </div>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <div class="card-header">
  <strong class="card-title" style="color:#191978;"><i class="ti-comment-alt"></i>  Message</strong>
                    </div>
              <div class="dropdown-item"> 
                    <div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
                        <table id="customer_datam" class="table table-striped table-hover">
<thead>
                <tr> 
                   <th>store id</th>
                    <th>Staff_id</th>
                    <th>Message</th>
                    <th>Staff_type</th>
                    <th>Time</th>
                </tr>
                  </thead>
                <tbody>  
                <?php

                  $displayquery = "SELECT * FROM message";
                  $querydisplay = mysqli_query($conn , $displayquery);         
                ?>
    <?php
foreach ($querydisplay as $row3) {
   $timestamp = $row3['timestamp'];

  $original_date = $timestamp;
$timestamp = strtotime($original_date);
$new_date = date("d-M-Y h:i:s a", $timestamp);
  ?>
  <tr>
  <td>
   <?php echo "STR".$row3['store_id'];?>
 </td>
  <td>
   <?php echo $row3['staff_id'];?>
 </td>
 <td>
   <?php echo $row3['message'];?>
 </td>
 <td>
   <?php echo $row3['staff_type'];?>
 </td>
 <td>
   <?php echo $new_date?>
 </td>
      </tr>
<?php 
}           
?>
            </tbody></table></div>                
            </div></div></li>
    <?php

$displayquerynew = "select * from landing_page where id=2";
$querydisplaynew = mysqli_query($conn , $displayquerynew);
foreach($querydisplaynew as $row5) {
  ?>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
            <img src="upload/<?php echo $row5['logo'];?>" style="width:40px;height:40px;" alt="Image Not Found"/>
            </a>
                 <?php 
}           
?>
<?php 
   $id=$_SESSION["id"];
   $username=$_SESSION["username"]; 
 $result ="select * from admin WHERE id=$id"; 
                $res=mysqli_query($conn,$result);
             while($row=mysqli_fetch_array($res))
             { 
                $name = $row['name'];

              }
               ?>
   
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="card dropdown-item">
    <img src="upload/<?php echo $row5['logo'];?>" style="width:70px;height:70px; border-radius:50%; background:trasparent;" class="" alt="...">
    <div class="card-body text-center">
        <h5><?php echo $name;?></h5>
        <h5><?php echo $username;?></h5>
          <a href="profile" class="dropdown-item"><button class="btn" style="border-radius:20px; background:#F8F9FC; border:1px solid black;">Change Password</button> 
              </a><br>
        <a href="logout" class="btn btn-primary text-white" style="border-radius:2px; border:1px solid #E8E7EC;">Log out</a>
    </div>
</div>

             <!--  <h3 class="text-center"><?php echo $name;?></h3>
              <a href="profile" class="dropdown-item">             
               <img src="upload/<?php echo $row5['logo'];?>" style="width:30px;height:30px; padding:2px;" alt="Image Not Found"/>
                Change Password
              </a>
              <a href="logout" class="dropdown-item">
                <img src="https://img.icons8.com/cute-clipart/64/000000/exit.png" style="width:30px;height:30px; padding:2px;" />
                Logout
              </a> -->
            </div>
          </li>
        </ul>
  

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <style type="text/css">
      .menu-title{
         margin-left: 10px;
      }
    </style>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="home">
             <img src="https://img.icons8.com/external-flat-lima-studio/64/000000/external-dashboard-web-design-flat-lima-studio.png" width="35px" height="30px"/>
              <span class="menu-title"> Dashboard</span>
            </a>
          </li>
          <!--  <li class="nav-item">
            <a class="nav-link" href="party_list">
              <img src="https://img.icons8.com/fluency/48/000000/group.png" width="35px" height="30px"/>
              <span class="menu-title"> Party List</span>
            </a>
          </li> -->
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="ui-basic">
              <img src="https://img.icons8.com/color/50/000000/group-foreground-selected.png" width="35px" height="30px"/>
              <span class="menu-title">Account</span>
               <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="customer">Customer</a></li>
                <li class="nav-item"> <a class="nav-link" href="supplier">Supplier</a></li>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#master" aria-expanded="false" aria-controls="ui-basic">
             <img src="https://img.icons8.com/color/48/000000/master.png" width="35px" height="30px"/>
              <span class="menu-title"> Master</span>
               <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="master">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Category">Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="item">Item</a></li>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#staff" aria-expanded="false" aria-controls="ui-basic">
            <img src="https://img.icons8.com/ios-filled/50/000000/conference-background-selected.png" width="35px" height="30px" />
              <span class="menu-title"> Staff Type</span>
               <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="staff">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="staff">Add Staff</a></li>
                 <li class="nav-item"> <a class="nav-link" href="staff_ty">StaffType</a></li>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
             <img src="https://img.icons8.com/external-nawicon-flat-nawicon/64/000000/external-store-grocery-nawicon-flat-nawicon.png" width="35px" height="30px" />
              <span class="menu-title"> Store</span>
               <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="storelist">Store List</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <img src="https://img.icons8.com/external-flat-juicy-fish/60/000000/external-online-digital-nomad-flat-flat-juicy-fish-4.png" width="35px" height="30px" />
              <span class="menu-title"> Reporting</span>
               <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="daily_sale">Daily sale </a></li>
                <li class="nav-item"> <a class="nav-link" href="daily_purchase">Daily Purchase </a></li>
                <li class="nav-item"> <a class="nav-link" href="stock_report"> Stock Report </a></li>
                <li class="nav-item"> <a class="nav-link" href="profit_report"> Profit Report </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Ledger">
              <!-- <i class="ti-notepad menu-icon"></i> -->
            <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/000000/external-ledger-accounting-flaticons-lineal-color-flat-icons.png" width="35px" height="30px" />
              <span class="menu-title"> Ledger</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="report_list">
             <!--  <i class="ti-clipboard menu-icon"></i> -->
             <img src="https://img.icons8.com/external-inipagistudio-lineal-color-inipagistudio/64/000000/external-report-student-counselor-inipagistudio-lineal-color-inipagistudio.png" width="35px" height="30px" />
              <span class="menu-title"> Report</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Setting">
          <!--     <i class="ti-settings menu-icon"></i> -->
          <img src="https://img.icons8.com/external-justicon-flat-justicon/64/000000/external-setting-notifications-justicon-flat-justicon.png" width="35px" height="30px" />
              <span class="menu-title"> Setting</span>
            </a>
          </li>
        </li>
           <li class="nav-item">
            <a class="nav-link" href="activitylog">
            <!--   <i class="ti-clipboard menu-icon"></i> -->
            <img src="https://img.icons8.com/fluency/48/000000/event-log.png" width="35px" height="30px" />
              <span class="menu-title"> Activity Log</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout">
              <!-- <i class="ti-power-off menu-icon"></i> -->
             <img src="https://img.icons8.com/cute-clipart/64/000000/exit.png" width="35px" height="30px" />
              <span class="menu-title"> Logout</span>
            </a>
          </li>
        </ul>
      </nav>
    

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/chart.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_datam').DataTable({
   dom: 'lBfrtip',
   buttons: [
    
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
 
</script>

 <script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"update_message_status.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count_id').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count_id').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>

<script>
  var preloader = document.getElementById('loading');
  function myfunction(){
    preloader.style.display= 'none';
  }

</script>

 <style type="text/css">
   table, th, td {
  border: 1px solid #ddd;
   border-collapse: collapse;
}
.tablen td{
padding: 18px;
}
.tablen tr:hover{
  background-color: #D6EEEE;
}

/* Transparent Overlay */


/* Absolute Center Spinner */
#loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;

}

/* Transparent Overlay */
#loading:before {
  content: '';
 display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(196,221,251,1) 100%);

 /*  background: url('http://www.downgraf.com/wp-content/uploads/2014/09/01-progress.gif?e44397') 50% 50% no-repeat rgb(249,249,249); */
 
}


/* :not(:required) hides these rules from IE9 and below */
#loading:not(:required) {
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

#loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

  .card{
    border-radius: 10px;
  }
  .breadcrumb-item a{
    text-decoration: none;
  }

 </style>



 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>


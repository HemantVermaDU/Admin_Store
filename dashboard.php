<?php 
include("check.php");
?>
<?php 
include("header.php");
include("connect.php");
 ?>
 <?php
        $sql="select count(id) as id1 from stores where status='0'";
$result=$conn->query($sql);
   $row=$result->fetch_assoc();
 ?>
 <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Welcome Admin</h4>
                </div>
                <div>
                   <h5 class="text-right">Last Login : ?</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card" id="first">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Store</p>
                 <!--  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"> -->
                    <h1 class="text-danger text-center"><?php echo  $row['id1'];?></h1>
                  <!--   <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> -->
                  </div>  
                </div>
              </div>
           <!--  </div> -->
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card" id="first1">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Company</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"></h3>
                  <!--   <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> -->
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card" id="first2">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Customer</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"></h3>
                  <!--   <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> -->
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card" id="first3">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Today Sale</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"></h3>
                   <!--  <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i> -->
                  </div>  
                </div>
              </div>
            </div>
          </div>
             




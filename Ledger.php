<?php 
include("check.php");
include("header.php");
include("connect.php");
$displayquery = "select * from party";
$querydisplay = mysqli_query($conn , $displayquery);
 ?>
 <?php
    $query = mysqli_query($conn, "SELECT SUM(total_price) AS total FROM `purchase`") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query);
     
     $queryn = mysqli_query($conn, "SELECT SUM(total_price) AS totaln FROM `sale`") or die(mysqli_error());
    $fetchn = mysqli_fetch_array($queryn);
     ?>  

 <style type="text/css">
   #tpurchase{
  border-radius: 20px;
   }
   #tselling{
     border-radius: 20px;
     background-color: #D5F5E3;
   }
    .border-left-primary{border-left:.35rem solid #fc88a1!important}
               .border-left-secondary{border-left:.35rem solid #1cc88a!important}
 </style>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Company Ledger</h3>
                </div>
                <div> 
            <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ledger</li>
  </ol>
</nav>             
                </div>
              </div>
            </div>
          </div>

 <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card border-left-primary" id="tpurchase" >
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Purchase Amount</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                     <img src="https://img.icons8.com/external-kosonicon-flat-kosonicon/50/000000/external-rupee-symbol-currency-kosonicon-flat-kosonicon-2.png" />
              <h2 class="text-secondary mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><label class=""><?php echo number_format($fetch['total'])?></label></h2>
                  </div>
                  </div>  
                </div>
              </div>

              <div class="col-md-4 grid-margin stretch-card">
              <div class="card border-left-secondary" id="tselling">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Selling Amount</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <img src="https://img.icons8.com/external-kosonicon-flat-kosonicon/50/000000/external-rupee-symbol-currency-kosonicon-flat-kosonicon-2.png"/>
              <h2 class="text-secondary mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><label class=""><?php echo number_format($fetchn['totaln'])?></label></h2>
                  </div>
                  </div>  
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Ledger</h3>
                </div>
                <div>              
                </div>
              </div><br>
<div class="card">
  <div class="card-header">
  <strong class="card-title" style="color:#191978;"><i class="ti-receipt"></i> Ledger</strong>
    </div>
<div class="card-block">
<div class="table-responsive pt-3"
   style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
 <table id="customer_data" class="table table-striped table-hover">
<thead>
                <tr> 
                   <th>id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>mobile</th>
                    <th>email</th>
                     <th>GST No</th>
                      <th>state_code</th>
                       <th>Balance</th>
                       <th>Status</th>
                </tr>
                  </thead>
                <tbody>            
<?php
foreach ($querydisplay as $row3) {
  $id =$row3['id'];
  ?>
  <tr>
  <td>
   <?php echo "PRT".$row3['id'];?>
 </td>
    <td>
 <?php echo $row3['name'];?>
   </td>
   <td>
   <?php echo $row3['address'];?>
   </td>
    <td> 
       <?php echo $row3['mobile'];?>
        </td>
         <td> 
       <?php echo $row3['email'];?>
        </td>
         <td> 
       <?php echo $row3['gst_number'];?>
        </td>
         <td> 
       <?php echo $row3['state_id'];?>
        </td>
        <td> 
       <?php echo $row3['balance'];?>
        </td>
        <td> 
     <?php if($row3['status'] == 'active'): ?>
                                    <span class="btn btn-success btn-xs rounded-pill text-white">Active</span>
                                <?php else: ?>
                                    <span class="btn btn-danger btn-xs rounded-pill text-white">Inactive</span>
                                <?php endif; ?>
        </td>
      </tr>
<?php 
}
?>    
  </tbody>
   </table>
    </<div>
  </div>


<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_data').DataTable({
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy',
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
 
</script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
 <script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/js/init-scripts/data-table/datatables-init.js"></script>

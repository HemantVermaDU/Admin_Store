<?php 
include("check.php");
include("header.php");
include("connect.php");
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
   #tprofit{
    border-radius: 20px;
     background-color:;
}
              .border-left-primary{border-left:.35rem solid #fc88a1!important}
               .border-left-secondary{border-left:.35rem solid #858796!important}
                .border-left-success{border-left:.35rem solid #1cc88a!important}

 </style>

  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Profit Report</h3>
                </div>
                <div>
              <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profit Report</li>
  </ol>
</nav>
                </div>
              </div>
            </div>
          </div>
   <!-- card start  -->
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
              <div class="card border-left-success" id="tselling">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Selling Amount</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <img src="https://img.icons8.com/external-kosonicon-flat-kosonicon/50/000000/external-rupee-symbol-currency-kosonicon-flat-kosonicon-2.png"/>
              <h2 class="text-secondary mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><label class=""><?php echo number_format($fetchn['totaln'])?></label></h2>
                  </div>
                  </div>  
                </div>
              </div>
               <?php
$sql = "SELECT ((SELECT SUM(selling_price) FROM item) - (SELECT SUM(buying_price) FROM item)) AS total";
$resultsql =mysqli_query($conn, $sql);
foreach ($resultsql as $row3) {
    $total = $row3['total'];
    ?>
   <!--  <td>
        <?php if($total >= 0.00): ?>
          <?php echo $total = $row3['total']; ?>
          <?php else: ?>
              <?php echo $total = $row3['total']; ?>
     <?php endif; ?></td> -->
<?php
}
?>
                 <div class="col-md-4 grid-margin stretch-card">
              <div class="card border-left-secondary" id="tprofit">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Profit Amount</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <img src="https://img.icons8.com/external-kosonicon-flat-kosonicon/50/000000/external-rupee-symbol-currency-kosonicon-flat-kosonicon-2.png"/>
              <h2 class="text-secondary mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $total = $row3['total']; ?></h2>
                  </div>
                  </div>  
                </div>
              </div>
            </div>

   <!-- card end -->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title" style="color:#191978;"><i class="ti-receipt"></i> Profit Report</strong>
                    </div>
                    <div class="table-responsive pt-3" style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
 <table id="customer_data" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    
       <th>Item id</th>
      <th>store id</th>
      <th>Category id</th>
      <th>Name</th>
      
                                   
                                                                  
                                                            
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                        
                                       
                                     $result = "select * from item";

                                        $resultn=mysqli_query($conn,$result);

                                        while($row=mysqli_fetch_assoc($resultn))
                                        {
                                           
                                          
                                          ?> 

                                     

                                        
                                <tr>
                                  <td><?php echo "ITM".$row["id"]?></td>
                                     <td><?php echo "STR".$row["store_id"]?></td>
                                     <td><?php echo "CTG".$row["category_id"]?></td> 
                                   <td><?php echo $row["name"]?></td>
  <?php
                                        }
                                        
                                        ?>

                                   <!--   <?php
                                        
                                       
                                     $resultminus = "select store_id,SUM(selling_price - buying_price) from item GROUP BY store_id";

                                        $resultm=mysqli_query($conn,$resultminus);

                                        while($rowminus=mysqli_fetch_assoc($resultm))
                                        {
                                           
                                          
                                          ?> 
                                   <td><?php echo $rowminus["SUM(selling_price - buying_price)"]?></td>
                                   

                                   
                                </tr>

                                <?php
                                        }
                                        
                                        ?>
 -->


                            </tbody>
                        </table>
                    </div>
                    
                </div>
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

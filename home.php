<?php 
include("check.php");
include("header.php");
include("connect.php");
       $id=$_SESSION["id"];
       $last_login=$_SESSION["last_login"];              
               $result ="select * from admin WHERE id=$id"; 
                $res=mysqli_query($conn,$result);
             while($row=mysqli_fetch_array($res))
             { 
                $last_login=$row["last_login"];
                $name = $row['name'];

  $original_date = $last_login;
$last_login = strtotime($original_date);
$new_date = date("d-M-Y h:i:s a", $last_login);
              }
 ?>

 <!-- Style css -->
  <style type="text/css">
              .border-left-primary{border-left:.35rem solid #fc88a1!important}
               .border-left-secondary{border-left:.35rem solid #858796!important}
                .border-left-success{border-left:.35rem solid #1cc88a!important}
                 .border-left-info{border-left:.35rem solid #36B9CC!important}
            </style>

            <!-- end style -->
 <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Welcome, <?php echo $name;?></h3>
                </div>
                <div>
                   <h5 class="text-right" style="color:#191978;">Last Login : <?php echo $new_date?></h5>
                </div>
              </div>
            </div>
          </div>
         <?php
   $sql="select count(id) as id1 from store";
   $result=$conn->query($sql);
   $row=$result->fetch_assoc();
 ?> 
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-left-secondary shadow h-100" id="first">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Store</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h2 class="text-secondary mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo  $row['id1'];?></h2>
                   <img src="https://img.icons8.com/external-nawicon-flat-nawicon/64/000000/external-store-grocery-nawicon-flat-nawicon.png"/>
                  </div>
                  </div>  
                </div>
              </div>
           <!--  </div> -->
              <?php
//     $query = mysqli_query($conn,"select Date('timestamp'), COUNT(id) as totalp from purchase group by DATE(timestamp) DESC
// LIMIT 1") or die(mysqli_error());
 $query = mysqli_query($conn,"select Count(id) as totalp FROM purchase WHERE timestamp >= DATE(NOW())") or die(mysqli_error());
foreach($query as $rowp)
{

}
?>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-left-primary shadow h-100"  id="first1">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Daily Purchase</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h2 class="text-secondary mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $rowp['totalp'];?></h2>
                   <img src="https://img.icons8.com/external-sbts2018-flat-sbts2018/58/000000/external-purchase-cyber-monday-sbts2018-flat-sbts2018.png"/>
                </div>
                </div>
              </div>
            </div>

                 <?php
   $sqlres="select count(id) as id4 from party";
   $resultn=$conn->query($sqlres);
   $row=$resultn->fetch_assoc();
 ?>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-left-info shadow h-100" id="first2">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Party</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                   <h2 class="text-secondary mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $row['id4'];?></h2>
                  <img src="https://img.icons8.com/fluency/48/000000/group.png"/>
                  </div>  
                </div>
              </div>
            </div>

             <?php
$query = mysqli_query($conn,"select Count(id) as totaln FROM sale WHERE timestamp >= DATE(NOW())") or die(mysqli_error());

 // $query = mysqli_query($conn,"select DATE(timestamp) as timestamp, COUNT(id) as totaln from sale group by DATE(timestamp) DESC LIMIT 1") or die(mysqli_error());
foreach($query as $row5)
{

}

 ?>


            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-left-success shadow h-100" id="first3">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Today Sale</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h2 class="text-secondary mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $row5['totaln'];?></h2>
                    <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/000000/external-sale-auction-house-flaticons-lineal-color-flat-icons.png"/>
                  </div>  
                </div>
              </div>
            </div>
          </div>



             <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daily Sale</h4>
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>
             <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Total Store/Total Party</h4>
                  <canvas id="doughnutChart"></canvas>
                </div>
              </div>
            </div>
        </div>

         <script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_datan').DataTable({
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy',
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
 
</script>
         
          <div class="row">
            <div class="col-md-12 grid-margin">

              <div class="d-flex justify-content-between align-items-center">
                <div>

                  <h3 class="font-weight-bold mb-0 d-flex justify-content-between align-items-center" style="color:#191978;">OUT OF STOCK</h3>
                </div>
                <div>
                </div>
              </div><br>
           <?php                 
                    $db= "select * from item where quantity='null'";
                    $outquery = mysqli_query($conn , $db);
                    if(!empty($outquery)){  ?>

                      <div class="card">
                        <div class="card-header">
  <strong class="card-title" style="color:#191978;"><i class="ti-shopping-cart"></i>  Out of stock</strong>
                    </div>
                        <div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem;">
                        <table id="customer_datan" class="table table-striped table-hover">
                            <thead>                         
                                <tr class="text-center">
                                  <th>Item id</th>
                                  <th>Store id</th>
                                     <th>Category id</th>  
                                    <th> Item Name</th>  
                                    <th>Quantity</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($outquery as $q){ ?>
                                    <tr class="text-center">
                                  <td><?php echo "ITM".$q['id']; ?></td>
                                   <td><?php echo "STR".$q['store_id']; ?></td>
                                   <td><?php echo "CTG".$q['category_id']; ?></td>
                                    <td><?php echo $q['name']; ?>
                                    </td>
                                     <td>
                                        <?php if($q['quantity'] >=1): ?>
                                    <span class=""><?php echo $q["quantity"]?></span>
                                <?php else: ?>
                                    <span class="text-danger"><?php echo "OUT OF STOCK"?></span>
                                <?php endif; ?>
                                    </td>
                                </tr>
                        <?php } ?>
                            </tbody>
                        </table>
                      </div></div>
                    <?php } ?>
<br><br>
         <!--OUT OF STOCK END  -->
         <!-- start sale -->
   <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
       <div class="card-header">
  <strong class="card-title" style="color:#191978;"><i class="ti-shopping-cart"></i>  Today's Sale List</strong>
                    </div>
                    <div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
                        <table id="customer_dataq" class="table table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Id</th>
                                    <th>Transaction Id</th>
                                    <th>Party Id</th>
                                    <th>Store Id</th>
                                    <th>Category Id</th>
                                    <th>Item Id</th>
                                    <th>Quantity</th>
                                      <th>GST</th>
                                       <th>Timestamp</th>
                                       <th>Total Price</th>
                                       <!--  <th>Balance</th> -->
                                </tr>
                                  </thead>
         <?php
    $query = mysqli_query($conn, "SELECT SUM(total_price) AS totalppp FROM `sale` WHERE timestamp >= DATE(NOW())") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query);
     ?>                           <tbody>            
<?php
  $displayquery = "SELECT * 
FROM sale
WHERE timestamp >= DATE(NOW()) ORDER BY `id` DESC";

 $querydisplay = mysqli_query($conn , $displayquery);

foreach ($querydisplay as $row3) {
  $id = $row3['id'];

  $timestamp=$row3["timestamp"];
  $original_date = $timestamp;
$timestamp = strtotime($original_date);
$new_date = date("d-M-Y h:i:s a", $timestamp);
  ?>
  <tr class="text-center">
  <td>
   <?php echo $row3['id'];?>
 </td>
 <td>
   <?php echo $row3['transaction_id'];?>
   </td>
   <td>
   <?php echo "PRT".$row3['party_id'];?>
   </td>
    <td>  
       <?php echo "STR".$row3['store_id'];?>
        </td>
         <td>  
       <?php echo "CTG".$row3['category_id'];?>
        </td>
         <td>  
       <?php echo "ITM".$row3['item_id'];?>
        </td>
         <td>  
       <?php echo $row3['quantity'];?>
        </td>     
         <td>  
       <?php echo $row3['with_gst'];?>
        </td>
         <td>  
       <?php echo $new_date?>
        </td>
         <td>  
       <?php echo "&#8377; ".$row3['total_price'];?>
        </td>
         
      </tr>
<?php 
}
?>    
  </tbody> 
  <tr class="text-center" > 
                             <td colspan="9" class="text-danger text-center">Today Total Price</td>
                              <td class="text-danger">
             <?php echo "&#8377; ".$fetch['totalppp']?>
     </td>
        </tr>                    
    </table>
     </div>
        </div>
          </div>
              </div>
<!-- end sale -->
<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_dataq').DataTable({
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy',
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
</script>

<!--  -->

<!-- Today Purchase start -->

   <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
  <strong class="card-title" style="color:#191978;"><i class="ti-shopping-cart"></i>  Today Purchase List</strong>
                    </div>
                    <div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem;padding-bottom: 1rem;">
           <table id="customer_datapp" class="table table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Id</th>
                                    <th>Party Id</th>
                                    <th>item Id</th>
                                    <th>Category Id</th>
                                    <th>Store Id</th>
                                    <th>Quantity</th>
                                    <th>Balance</th>
                                    <th>Timestamp</th>
                                    <th>Total_price</th>    
                                </tr>
                                    </thead>
    <tbody>      
    <?php
    $query = mysqli_query($conn, "SELECT SUM(total_price) AS total FROM `purchase` WHERE timestamp >= DATE(NOW())") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query);
     ?>   
 
<?php
$displayquery = "SELECT * 
FROM purchase
WHERE timestamp >= DATE(NOW()) ORDER BY `id` DESC";
$querydisplay = mysqli_query($conn , $displayquery);
foreach ($querydisplay as $row3) {
  $id = $row3['id'];
   $timestamp = $row3['timestamp'];

  $original_date = $timestamp;
$timestamp = strtotime($original_date);
$new_date = date("d-M-Y h:i:s a", $timestamp);
  ?>
  <tr class="text-center">
  <td>
   <?php echo $row3['id'];?>
 </td>
   <td>
   <?php echo "PRT".$row3['party_id'];?>
   </td>
    <td>  
       <?php echo "ITM".$row3['item_id'];?>
        </td>
         <td>  
       <?php echo "CTG".$row3['category_id'];?>
        </td>
         <td>  
       <?php echo "STR".$row3['store_id'];?>
        </td>
         <td>  
       <?php echo $row3['quantity'];?>
        </td>
          <td>  
       <?php echo $row3['balance'];?>
        </td>
          <td>  
       <?php echo $new_date?>
        </td>
         <td>  
       <?php echo "&#8377; ".$row3['total_price'];?>
        </td>
      </tr>


<?php 
}
?>   

  </tbody>

                        

                             <tr class="text-center"> 
                             <td colspan="8" class="text-danger text-center">Today Total Price</td>
                              <td class="text-danger">
             <?php echo "&#8377; ".$fetch['total']?>
     </td>
        </tr>
                         
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_datapp').DataTable({
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



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
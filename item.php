<?php 
include("check.php");
include("header.php");
include("connect.php");
 ?>
 <!-- Profit or Loss end -->
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">List of Items</h3>
                </div>
                <div>  
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Item</li>
  </ol>
</nav> 
                </div>
              </div>
            </div>
          </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
<div class="card">
   <div class="card-header">
     <strong class="card-title" style="color:#191978;"><i class="ti-agenda"></i>  List of items</strong>
     </div>
 <div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
<table id="customer_data" class="table table-bordered table-striped table-hover">
<thead>
     <tr class="text-center">
      <th>Id</th>
      <th>Store id</th>
      <th>Category id</th>
      <th>Image</th>
      <th>Name</th>
      <th>Description</th>
      <th>Quantity</th>
      <th>Buying Price</th>
      <th>Selling Price</th>
      <th>GST %</th>
      <th>Item Unit</th>  
      <th>Status</th> 
     <!--  <th>Action</th> -->
                </tr>
                  </thead>
                <tbody>          
<?php
$displayquery = "select * from item";
$querydisplay = mysqli_query($conn , $displayquery);
foreach ($querydisplay as $row3) {
  $id = $row3['id'];

  ?>
     <?php     
                           $result_new="SELECT value from settings where name='item'";
                           $a=mysqli_query($conn,$result_new);
                                $name="";
                                while($q=mysqli_fetch_assoc($a)){
                                    $name=$q["value"];
                                }
                              
                                ?>
                                 <?php     
                           $result_new="SELECT value from settings where name='category'";
                           $a=mysqli_query($conn,$result_new);
                                $namec="";
                                while($q=mysqli_fetch_assoc($a)){
                                    $namec=$q["value"];


                                }
                              
                                ?>
                                
                                   <?php     
                           $result_new="SELECT value from settings where name='store'";
                           $a=mysqli_query($conn,$result_new);
                                $names="";
                                while($q=mysqli_fetch_assoc($a)){
                                    $names=$q["value"];
                                }
                              
                               
                                ?>
  <tr class="text-center">
     <td><?php echo $name.$row3["id"]; ?></td>  
    <td>
   <?php echo $names.$row3['store_id'];?>
   </td>
    <td>
   <?php echo $namec.$row3['id'];?>
   </td>
    <td>
   <img src="<?php echo $row3['image']; ?>" style="width:35px;height:35px;" alt="image" class="img-thumbnail" />
   </td>
   <td>
   <?php echo $row3['name'];?>
   </td>
    <td>
   <?php echo $row3['description'];?>
   </td>
    <td>
   <?php echo $row3['quantity'];?>
   </td>
    <td>
   <?php echo "&#8377; ".$row3['buying_price'];?>
   </td>
   <td>
   <!-- <?php echo $row3['selling_price'];?> -->
        <?php 
        if($row3['selling_price']>0): ?>
         <?php echo $total = "&#8377; ".$row3['selling_price']; ?>
          <?php else: ?>
           <span class="btn btn-danger btn-xs rounded-pill text-white">pending</span>
     <?php endif; ?>
   </td>
    <td>
   <?php echo $row3['gst']." %";?>
   </td>
   <td>
   <!-- <?php echo $row3['item_unit'];?> -->
     <?php 
       // $fetchsetting ="select * from setting where item_qantity_type"; 
      if($row3['item_unit']==1): ?>
       <span class="">piece</span>
       <?php elseif($row3['item_unit']==2): ?>
         <span class="">kg</span>
          <?php endif; ?>
   </td>
     <td>
     <?php if($row3['status'] == 'active'): ?>
                                    <span class="btn btn-success btn-xs rounded-pill text-white">Active</span>
                                <?php else: ?>
                                    <span class="btn btn-danger btn-xs rounded-pill text-white">Inactive</span>
                                <?php endif; ?>
   </td>
   <!--  <td> 
      <?php echo "<a href='edititems.php?edit&id={$id}' class='ti-pencil-alt btn-xm' title='Edit Here'></a>";?>
         <?php echo "<a href='deleteitems.php?delete={$id}'"?> onclick="return confirm('Are you sure to delete this record?')">  <button id="delete" name="delete" class="ti-trash btn btn-xm" title="Delete"></button></a>
        </td> -->
      </tr>
<?php 
}
?> 
  </tbody>
   </table>
    </<div>
  </div>
</div>
        </div>

<!-- Total Price  start-->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
<div class="card">
   <div class="card-header">
   <strong class="card-title" style="color:#191978;"><i class="ti-money"></i>  Total Buying Price</strong>
     </div>
 <div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
<table id="customer_datad" class="table table-bordered table-striped table-hover">
<thead>
    <tr>
        <th>Store id</th>
        <th>Total Price</th>
    </tr>
</thead>
<tbody>
<?php
$queryN ="select store_id, SUM(buying_price) from item GROUP BY store_id";
$resultsum =mysqli_query($conn, $queryN);
 foreach($resultsum as $row5){                          
    ?>
    <tr>
        <td><?php echo "STR".$row5['store_id'] ?></td>
       <td><?php echo "&#8377; ".$row5['SUM(buying_price)'] ?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div></div></div></div>
<!-- Total Price end -->

<!-- Total Selling Price start-->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
<div class="card">
   <div class="card-header">
   <strong class="card-title" style="color:#191978;"><i class="ti-money"></i>  Total Selling Price</strong>
     </div>
 <div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
<table id="customer_datan" class="table table-bordered table-striped table-hover">
<thead>
    <tr>
        <th>Store id</th>
        <th>Total Price</th>
    </tr>
</thead>
<tbody>
<?php
$queryN ="select store_id, SUM(selling_price) from item GROUP BY store_id";
$resultsum =mysqli_query($conn, $queryN);
 foreach($resultsum as $row4){                          
    ?>
    <tr>
        <td><?php echo "STR".$row4['store_id'] ?></td>
       <td><?php echo "&#8377; ".$row4['SUM(selling_price)'] ?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div></div></div></div>
<!-- Total selling price end -->
<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_datad').DataTable({
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
 
</script>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_datan').DataTable({
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
 
</script>


<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_data').DataTable({
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
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
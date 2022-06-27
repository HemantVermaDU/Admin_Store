<?php 
include("check.php");
include("header.php");
include("connect.php");
$displayquery = "select * from purchase";
$querydisplay = mysqli_query($conn , $displayquery);
 ?>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Daily Purchase</h4>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>     
          
   <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Purchase List</h2>
                    </div>
                    <div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem;">
                        <table id="bootstrap-data-table-export" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Party Id</th>
                                    <th>item Id</th>
                                    <th>Category Id</th>
                                    <th>Store Id</th>
                                    <th>Quantity</th>
                                    <th>Balance</th>
                                    <th>Timestamp</th>
                                    <th>Total_price</th>
                                    <th>Upload_receipt</th>
                                </tr>
    <tbody>            
<?php
foreach ($querydisplay as $row3) {
  $id = $row3['id'];
  ?>
  <tr>
  <td>
   <?php echo $row3['id'];?>
 </td>
   <td>
   <?php echo $row3['party_id'];?>
   </td>
    <td>  
       <?php echo $row3['item_id'];?>
        </td>
         <td>  
       <?php echo $row3['category_id'];?>
        </td>
         <td>  
       <?php echo $row3['store_id'];?>
        </td>
         <td>  
       <?php echo $row3['quantity'];?>
        </td>
          <td>  
       <?php echo $row3['balance'];?>
        </td>
          <td>  
       <?php echo $row3['timestamp'];?>
        </td>
         <td>  
       <?php echo $row3['total_price'];?>
        </td>
          <td>  
       <?php echo $row3['upload_receipt'];?>
        </td>
      </tr>
<?php 
}
?>    
  </tbody>
                            </thead>
                         
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



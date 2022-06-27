<?php 
include("check.php");
include("header.php");
include("connect.php");
 ?>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Stock Report</h3>
                </div>
                <div>   
                   <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Stock_Report</li>
  </ol>
</nav>     
                </div>
              </div>       
            </div>
          </div>          
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title" style="color:#191978;"><i class="ti-receipt"></i> Stock Report</strong>
                    </div>
                    <div class="table-responsive pt-3" style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
       <table id="customer_data" class="table table-striped table-hover">
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
                                <!--  -->

                    
                               <!--  -->
                                <?php
                                
                                       
                                     $result = "select * from item";

                                        $resultn=mysqli_query($conn,$result);

                                        while($row=mysqli_fetch_assoc($resultn))
                                        {
                                           
                                          
                                          ?>     
                                           <?php     
                           $result_new="SELECT value from settings where name='category'";
                           $a=mysqli_query($conn,$result_new);
                                $name="";
                                while($q=mysqli_fetch_assoc($a)){
                                    $name=$q["value"];
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
                                    <td><?php echo "ITM".$row["id"]?></td>
                                    <td><?php echo $names.$row["store_id"]; ?></td>
                                     <td><?php echo $name.$row["category_id"]?></td>
                                    <td><?php echo $row["name"]?></td>

                                    <td>
                                        <?php if($row['quantity'] >=1): ?>
                                    <span class=""><?php echo $row["quantity"]?></span>
                                <?php else: ?>
                                    <span class="text-danger"><?php echo "OUT OF STOCK"?></span>
                                <?php endif; ?>
                                    </td>
                                   
                                </tr>

                                <?php
                                        }
                                        
                                        ?>



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

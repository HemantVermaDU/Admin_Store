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
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Activity Log</h3>
                </div>
                <div>  
                </div>
              </div>
            </div>
          </div>
            
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title" style="color:#191978;"><i class="ti-write"></i> Activity Log</strong>
                    </div>
                    <div class="table-responsive pt-3" style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
                        <table id="customer_dataz" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th> 
                                    <th>Message</th>
                                    <th>Date Time</th>                                                                                  
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                     $result = "select * from activity_log";
                                        $resultn=mysqli_query($conn,$result);
                                        foreach($resultn as $row ){
                                            $timestamp = $row['timestamp'];

  $original_date = $timestamp;
$timestamp = strtotime($original_date);
$new_date = date("d-M-Y h:i:s a", $timestamp);
                                      ?>
                                <tr>                           
                                     <td><?php echo $row["id"]?></td> 
                                    <td><?php echo $row["message"]?></td>
                                    <td><?php echo $new_date?></td>
                                </tr>

                                <?php
                                        }
                                        
                                        ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_dataz').DataTable({
   dom: 'lBfrtip',
   buttons: [
    
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
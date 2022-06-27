<?php
include("check.php");
include("header.php");
include("connect.php");
$displayquery = "select * from report";
$querydisplay = mysqli_query($conn , $displayquery);
  ?>
  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Manage Report</h3>
                </div>
                <div>
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Report</li>
  </ol>
</nav>
                </div>
              </div>
            </div>
          </div>
<!-- 
         <div class="row">
 <div class="page-body">
<div class="card">
<div class="card-header">
    <div class="col-sm-10">
        <a href="add_report.php"><button class="btn btn-primary pull-right text-white">+ Add Report</button></a>
    </div>
</div></div><br>
 -->
<div class="card">
  <div class="card-header">
  <strong class="card-title" style="color:#191978;"> <i class="ti-receipt"></i> Report List </strong>
     </div>
<div class="card-block">
<div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom:1rem;">
 <table id="customer_data" class="table table-striped table-hover">
<thead>
                <tr> 
                   <th>id</th>
                    <th>Image</th>
                    <th>Remark</th>  
                    <th>Action</th>              
                </tr>
                  </thead>
                <tbody>            
<?php
foreach ($querydisplay as $row3) {
  $id = $row3['id'];
  ?>
  <tr>
     <th scope="row"><?php echo $row3["id"];?></th>  
    <td>
<!--    <img src="<?php echo $row3['image'];?>" style="width:40px;height:40px;" class="img-thumbnail" />  -->
    <?php echo $row3['image'];?>
   </td>   
    <td>  
    <?php echo $row3['remarks'];?>
      </td>
     <td>
      <a class="btn btn-primary btn-xs text-white" title="view" style="border-radius:50%;"
                                            href="<?php echo $row3["image"]; ?>" target="_blank"><i class="ti-eye"></i></a></td>
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


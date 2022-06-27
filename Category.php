<?php 
include("check.php");
include("header.php");
include("connect.php");
?>

  <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">List of Categories
</h3>
                </div>
                <div>
                     <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Category</li>
  </ol>
</nav>  
                </div>
              </div>
            </div>
          </div>
     <div class="row">
 <div class="page-body">
<div class="card">
<div class="card-header">
    <div class="col-sm-10">
        <a href="addcategory.php"><button class="btn btn-primary btn-xs pull-right text-white"><i class="ti-plus"> Create New</i></button></a>
    </div>
</div></div><br>
<div class="card">
  <div class="card-header">
   <strong class="card-title" style="color:#191978;"><i class="ti-briefcase"></i>  Manage Category</strong>
     </div>
<div class="card-block">
<div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
<table id="customer_data" class="table table-striped table-hover">
<thead>
                <tr class="text-center"> 
                   <th>id</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                  </thead>
                <tbody>            
<?php
$displayquery = "select * from category";
$querydisplay = mysqli_query($conn , $displayquery);
 foreach ($querydisplay as $row3) {
                                  
  $id = $row3['id'];
  $status = $row3['status'];
  ?>
  <?php     
                           $result_new="SELECT value from settings where name='category'";
                           $a=mysqli_query($conn,$result_new);
                                $name="";
                                while($q=mysqli_fetch_assoc($a)){
                                    $name=$q["value"];
                                }
                              
                                ?>
  <tr class="text-center">
     <td><?php echo $name.$row3["id"]; ?></td>  
    <td>
      <img src="upload/<?php echo $row3['image'];?>" width="80" height="80" class="img-thumbnail">
   </td>
   <td>
   <?php echo $row3['name'];?>
   </td>
     <td>
 <!--  <?php echo $row3['status']; ?>  -->
                                 <?php if($row3['status'] == 'active'): ?>
                                    <span class="btn btn-success btn-xs rounded-pill text-white">Active</span>
                                <?php else: ?>
                                    <span class="btn btn-danger btn-xs rounded-pill text-white">Inactive</span>
                                <?php endif; ?>
                        
 </td>
    <td>  <?php echo "<a href='editcategory?edit&id={$id}' class='ti-pencil-alt btn-xm' title='Edit Here'></a>";
           ?>
      <?php echo "<a href='delete.php?id=$id'"?> onclick="return confirm('Are you sure to delete this record?')">
<button id="delete" name="delete" class="ti-trash btn btn-xm" title="Delete"></button>
      </a>
           
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



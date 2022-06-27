<?php 
include("check.php"); 
include("header.php");
include("connect.php");
$displayquery = "select * from staff";
$querydisplay = mysqli_query($conn , $displayquery);
 ?>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">List of Staff</h3>
                </div>
                <div>
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Staff</li>
  </ol>
</nav> 
                </div>
              </div>
            </div>
          </div>
          <div>     
          <div class="row">
 <div class="page-body">
<div class="card">
<div class="card-header">
    <div class="col-sm-10">
        <a href="addstaff.php"><button class="btn btn-primary btn-xs pull-right text-white"><i class="ti-plus"> Create New</i></button></a>
    </div>
</div>
</div></div></div><br>

 <div class="row">
 <div class="col-lg-12 grid-margin stretch-card">
<div class="card">
    <div class="card-header">
     <strong class="card-title" style="color:#191978;"><i class="ti-user"></i>  List of Staff</strong>
                    </div>
<div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
   <table id="customer_data" class="table table-striped table-hover">
<thead>
                <tr class="text-center"> 
                   <th>Id</th>
             <th>Store_id</th>
                  <th>Staff Name</th>                
                    <th>Mobile</th>
                     <th>Staff_type</th>
                     <th>Status</th>
                      <th>Action</th>
                </tr>
                  </thead>
                <tbody>            
<?php
foreach ($querydisplay as $row3) {
  $id = $row3['id'];
  ?>
      <?php     
                           $result_new="SELECT value from settings where name='store'";
                           $a=mysqli_query($conn,$result_new);
                                $name="";
                                while($q=mysqli_fetch_assoc($a)){
                                    $name=$q["value"];
                                }
                              
                                ?>
                            
  <tr class="text-center">
       <td class="stud_id">
   <?php echo $row3['id'];?> 
   </td>
    <td>
   <?php echo $name.$row3['store_id'];?> 
   </td>
    <td>
   <?php echo $row3['name'];?>
   </td>
     <td>
   <?php echo $row3['mobile'];?>
   </td>
     <td>
   <?php echo $row3['staff_type'];?>
   </td>
   <td>
    <?php if($row3['status'] == 'active'): ?>
                                    <span class="btn btn-success btn-xs rounded-pill text-white">Active</span>
                                <?php else: ?>
                                    <span class="btn btn-danger btn-xs rounded-pill text-white">Inactive</span>
                                <?php endif; ?>
   </td>      
    <td> 
   <!--    <a href="#" class="view_btn">View</a> -->
   <?php echo "<a href='#' class='view_btn ti-eye btn btn-xm' title='View'></a>";
           ?>
      <?php echo "<a href='editstaff.php?edit&id={$id}' class='ti-pencil-alt btn-xm' title='Edit Here'></a>";
           ?>
      <?php echo "<a href='delete_staff.php?id=$id'"?> onclick="return confirm('Are you sure to delete this record?')"> <button id="delete" name="delete" class="ti-trash btn btn-xm" title="Delete"></button></a>  
        </td>
      </tr>
<?php 
}
?>    


<!-- Modal -->
<div class="modal fade" id="storeviewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Staff </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="store_viewdata"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
  </tbody>
   </table>
    </<div>
    </div></div>
  </div>
  <script>   
      $(document).ready(function(){

          $('.view_btn').click(function (e){
            e.preventDefault();
             var stud_id = $(this).closest('tr').find('.stud_id').text();
              // console.log(stud_id);

             $.ajax({
              type:"POST",
              url :"code.php",
              data : {
                'checking_viewbtn': true,
                'student_id': stud_id,
              },
              success : function (response){
                      // console.log(response);
                    $('.store_viewdata').html(response);
                    $('#storeviewmodal').modal('show');
              }
             });
            // alert('hello');
          });
      });
   //close button
   $(function () {
        $(".close").click(function () {
            $("#storeviewmodal").modal("hide");
        });
    });  
  </script>




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

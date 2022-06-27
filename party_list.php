<?php 
include("check.php");
include("header.php");
include("connect.php");
$displayquery = "select * from party";
$querydisplay = mysqli_query($conn , $displayquery);
 ?>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Party List</h3>
                </div>
                <div> 
                   <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Part List</li>
  </ol>
</nav>                  
                </div>
              </div>
            </div></div>

    <div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
<div class="card">
  <div class="card-header ">
 <strong class="card-title" style="color:#191978;"><i class="ti-user"></i> Party List</strong>
     </div>
       <div class="table-responsive pt-3"
                        style="overflow-x:auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;  "> 
<table id="customer_data" class="table table-striped table-hover">
<thead >
                <tr class="text-center"> 
                   <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Email</th>
                     <th>GST No</th>
                      <th>State</th>
                       <th>Balance</th>
                       <th>Status</th>
                </tr>
                  </thead>
                <tbody>       

<?php
foreach ($querydisplay as $row3) {
  $id =$row3['id'];
  ?>
     <?php     
                           $result_new="SELECT value from settings where name='Party'";
                           $a=mysqli_query($conn,$result_new);
                                $name="";
                                while($q=mysqli_fetch_assoc($a)){
                                    $name=$q["value"];
                                }
                              
                                ?>                           
  <tr class="text-center">
     <th scope="row"><?php echo $name.$row3["id"]; ?></th>  
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
      <!--  <?php echo $row3['state_id'];?> -->
      <?php if($row3['state_id']==1): ?>
       <span class="">Jammu and Kashmir</span>
       <?php elseif($row3['state_id']==2): ?>
         <span class="">Himachal Pradesh</span>
         <?php elseif($row3['state_id']==3): ?>
         <span class="">Punjab</span>
         <?php elseif($row3['state_id']==4): ?>
         <span class="">Himachal Pradesh</span>
         <?php elseif($row3['state_id']==5): ?>
         <span class="">Uttarakhand</span>
         <?php elseif($row3['state_id']==6): ?>
         <span class="">Haryana</span>
         <?php elseif($row3['state_id']==7): ?>
         <span class="">Delhi</span>
         <?php elseif($row3['state_id']==8): ?>
         <span class="">Rajasthan</span>
         <?php elseif($row3['state_id']==9): ?>
         <span class="">Uttar Pradesh</span>
         <?php elseif($row3['state_id']==10): ?>
         <span class="">Bihar</span>
         <?php elseif($row3['state_id']==11): ?>
         <span class="">Sikkim</span>
         <?php elseif($row3['state_id']==12): ?>
         <span class="">Arunachal Pradesh</span>
       <?php elseif($row3['state_id']==13): ?>
         <span class="">Nagaland</span>
          <?php elseif($row3['state_id']==14): ?>
         <span class="">Manipur</span>
       <?php elseif($row3['state_id']==15): ?>
         <span class="">Mizoram</span>
         <?php elseif($row3['state_id']==16): ?>
         <span class="">Tripura</span>
         <?php elseif($row3['state_id']==17): ?>
         <span class="">Meghalaya</span>
         <?php elseif($row3['state_id']==18): ?>
         <span class="">Assam</span>
         <?php elseif($row3['state_id']==19): ?>
         <span class="">West Bengal</span>
         <?php elseif($row3['state_id']==20): ?>
         <span class="">Jharkhand</span>
         <?php elseif($row3['state_id']==21): ?>
         <span class="">Odisha</span>
         <?php elseif($row3['state_id']==22): ?>
         <span class="">Chattisgarh</span>
       <?php elseif($row3['state_id']==23): ?>
         <span class="">Madhya Pradesh</span>
          <?php elseif($row3['state_id']==24): ?>
         <span class="">Gujarat</span>
       <?php elseif($row3['state_id']==25): ?>
         <span class="">Daman and Diu</span>
           <?php elseif($row3['state_id']==26): ?>
         <span class="">Dadra and Nagar Haveli</span>
         <?php elseif($row3['state_id']==27): ?>
         <span class="">Maharashtra</span>
         <?php elseif($row3['state_id']==28): ?>
         <span class="">Andhra Pradesh</span>
         <?php elseif($row3['state_id']==29): ?>
         <span class="">Karnataka</span>
         <?php elseif($row3['state_id']==30): ?>
         <span class="">Goa</span>
         <?php elseif($row3['state_id']==31): ?>
         <span class="">Lakshadweep Islands</span>
         <?php elseif($row3['state_id']==32): ?>
         <span class="">Kerala</span>
       <?php elseif($row3['state_id']==33): ?>
         <span class="">Tamil Nadu</span>
          <?php elseif($row3['state_id']==34): ?>
         <span class="">Pondicherry</span>
       <?php elseif($row3['state_id']==35): ?>
         <span class="">Andaman and Nicobar Islands</span>
          <?php elseif($row3['state_id']==36): ?>
         <span class="">Telangana</span>
       <?php elseif($row3['state_id']==37): ?>
         <span class="">Andhra Pradesh (New)</span>

         <?php endif; ?>
        </td>
        <td> 
      <!--  <?php echo $row3['balance'];?> -->
       <?php if($row3['balance'] == 0): ?>
                                    <span class="">No Due</span>
                                <?php else: ?>
                                    <span class="btn btn-danger btn-xs text-white"><?php echo "&#8377; ".$row3['balance'];?> </span>
                                <?php endif; ?>
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
    </div>
  </div> </div></div>
 


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
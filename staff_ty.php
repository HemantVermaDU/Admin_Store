<?php 
include("check.php");
include("header.php");
include("connect.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
      <style>
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            color: black;
        }
        .tab button:hover {
            background-color: #ddd;
        }
        .tab button.active {
            background-color:;
        }
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

    </style>
 </head>
 <body>

<div class="main-panel">
    <div class="content-wrapper animated fadeIn">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            
                <div class="card">
                    <div class="card-header">
      <strong class="card-title" style="color:#191978;"><i class="ti-user"></i> Staff Type</strong>
                    </div>  
            <div class="tab">
  <button class="tablinks btn btn-rounded btn-primary" onclick="toggle(event, 'sale')"
                                    id="defaultOpen">sale</button>
      <button class="tablinks btn btn-rounded btn-success" onclick="toggle(event, 'purchase')">Purchase</button>
                     </div>

                   <div class="table-responsive pt-3 tabcontent" id="sale" style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
     <table id="customer_data" class="table table-striped table-hover">
                       
                            <thead>
                                 <tr class="text-center"> 
             <th>Store_id</th>
                  <th>Staff Name</th>                
                    <th>Mobile</th>
                     <th>Staff_type</th>
                     <th>Status</th>
                 
                </tr>
                            </thead>
                            <tbody>

                                <?php
                                  $resultn="select * from staff WHERE staff_type='sale'";
                                        $res = mysqli_query($conn, $resultn);
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                         $store_id = $row['store_id'];
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
    <th scope="row"><?php echo $name.$row["store_id"]; ?></th>  
    <td>
   <?php echo $row['name'];?>
   </td>
     <td>
   <?php echo $row['mobile'];?>
   </td>
     <td>
   <?php echo $row['staff_type'];?>
   </td>
   <td>
    <?php if($row['status'] == 'active'): ?>
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

                         
 <div class="table-responsive pt-3 tabcontent" id="purchase" style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem;">
    <table id="customer_datap" class="table table-striped table-hover">
                          
          <thead>
               <tr class="text-center"> 
                <th>Store_id</th>
                  <th>Staff Name</th>                
                    <th>Mobile</th>
                     <th>Staff_type</th>
                     <th>Status</th>                  
                </tr>
                            </thead>
                            <tbody>
                                  <?php
       $resultnew="select * from staff WHERE staff_type='puchase'";
           $result = mysqli_query($conn, $resultnew);

    
       while($row3=mysqli_fetch_assoc($result))
                 {
                  $store_id = $row3['store_id'];
                             ?>

             <tr class="text-center">
      <th scope="row"><?php echo $name.$row3["store_id"]; ?></th>  
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
      </tr>                      
                     
<?php 
}
?>    


 </tbody>
       </table>
                    </div>
  
      
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>



<script>
function toggle(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
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
         <script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_datap').DataTable({
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


 </body>
 </html>
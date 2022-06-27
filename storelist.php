<?php 
include("check.php"); 
include("header.php");
include("connect.php");
 ?>
  <?php
     $sub_sql="";
     $todate=$fromdate="";
     if(isset($_POST['submit']))
     {
      $from = $_POST['from'];
      $fromdate=$from;
      $fromArr = explode("/",$from);
      $from = $fromArr['2'].'-'.$fromArr['1'].'-'.$fromArr['0'];
      $from=$from." 00:00:00";

      $to = $_POST['to'];
      $todate=$to;
      $toArr = explode("/",$to);
      $to = $toArr['2'].'-'.$toArr['1'].'-'.$toArr['0'];
      $to=$to." 23:59:59";
     $sub_sql =" where start_year >= '$from' && end_year <= '$to'";
    }
      ?>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">List of Stores</h3>
                </div>
                <div>
                    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Store List</li>
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
        <a href="addstore"><button class="btn btn-primary btn-xs pull-right text-white"><i class="ti-plus" > Create New</i></button></a>
    </div>
</div>
</div><br><br>

 <form method="POST">
  <label for="from">From</label>
<input type="text" id="from" name="from" value="<?php echo $fromdate ?>" required>
<label for="to">to</label>
<input type="text" id="to" name="to" value="<?php echo $todate ?>" required>
<button name="submit" class="btn btn-success text-white btn-xs">Filter</button>
</form>
  <br>
 <div class="row">
 <div class="col-lg-12 grid-margin stretch-card">
<div class="card">
    <div class="card-header">
      <strong class="card-title" style="color:#191978;"><i class="ti-home"></i>  List of Stores</strong>
                    </div>
<div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem; padding-bottom: 1rem;">
<table id="customer_data" class="table table-striped table-hover">
<thead>
                <tr class="text-center">            
                 <th scope="row">Store_id</th>
                  <th>Name</th>
                  <th>Email</th>
                   <th>GST No.</th>
                   <th>Contact number</th>        
                     <th>Location</th>
                      <th>Start Year</th>
                       <th>End Year</th>
                        <th>Status</th>
                      <th>Action</th>
                </tr>
                  </thead>
                <tbody>            
<?php
$displayquery = "select * from store $sub_sql order by id desc";
$querydisplay = mysqli_query($conn , $displayquery);
foreach ($querydisplay as $row3) {
  $id = $row3['id'];
   $start_year = $row3['start_year'];
  $original_date = $start_year;
$start_year = strtotime($original_date);
$new_date = date("d-M-Y", $start_year);

 $end_year = $row3['end_year'];
  $original_date = $end_year;
$end_year = strtotime($original_date);
$new_datee = date("d-M-Y", $end_year);
  ?>
<!-- 
    <?php echo $row3['id'];?> -->

    <?php     
                           $result_new="SELECT value from settings where name='store'";
                           $a=mysqli_query($conn,$result_new);
                                $name="";
                                while($q=mysqli_fetch_assoc($a)){
                                    $name=$q["value"];
                                }
                               
                               
                                

                                ?>
  <tr class="text-center">
   <!--  <td class="stud_id">
   <?php echo $row3['id'];?>
   </td> -->
   <td><?php echo $name.$row3["id"]; ?></td>  
    <td>
   <?php echo $row3['name'];?>
   </td>
    <td>
   <?php echo $row3['email'];?>
   </td>
    <td>
   <?php echo $row3['gst'];?>
   </td>
   <td>
   <?php echo $row3['contact_number'];?>
   </td>
     <td>
   <?php echo $row3['location'];?>
   </td>
    <td>
   <?php echo $new_date?>
   </td>
   <td>
   <?php echo $new_datee?>
   </td>
     <td>
     <?php if($row3['status'] == 'active'): ?>
                                    <span class="btn btn-success btn-xs rounded-pill text-white">Active</span>
                                <?php else: ?>
                                    <span class="btn btn-danger btn-xs rounded-pill text-white">Inactive</span>
                                <?php endif; ?>
   </td>
    <td> 

      <?php echo "<a href='editstore.php?edit&id={$id}' class='ti-pencil-alt btn-xm' title='Edit Here'></a>";
           ?>
      <?php echo "<a href='deletestore.php?id=$id'"?> onclick="return confirm('Are you sure to delete this record?')">  <button id="delete" name="delete" class="ti-trash btn btn-xm" title="Delete"></button></a>  
        </td>
      </tr>
<?php 
}
?>    


 

 
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


<script>
  $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          dateFormat : "dd/mm/yy",
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat : "dd/mm/yy",
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
 <script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


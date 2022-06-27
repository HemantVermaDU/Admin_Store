<?php 
include("check.php"); 
include("header.php");
include("connect.php");
 ?>
<?php
    $query = mysqli_query($conn,"select Date('timestamp'), COUNT(id) as totaln from purchase group by DATE(timestamp) DESC
LIMIT 1") or die(mysqli_error());
foreach($query as $row5)
{

}
?>
 <?php 
      $query = mysqli_query($conn, "SELECT count(id) AS total FROM `purchase`") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query);
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


     $sub_sql ="where timestamp >= '$from' && timestamp <= '$to'";
    }
      ?> 
      <style type="text/css">
   .border-left-primary{border-left:.35rem solid #fc88a1!important}
</style>
       <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Purchase</h3>
                </div>
                <div>
                          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Daily Purchase</li>
  </ol>
</nav>
                </div>
              </div>
            </div>
          </div>  

           <!-- Card start-->
             <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-left-primary" id="tpurchase" >
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Purchase</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                <img src="https://img.icons8.com/external-parzival-1997-flat-parzival-1997/64/000000/external-purchase-shopstreaming-parzival-1997-flat-parzival-1997.png" height="50px" />
              <h2 class="text-secondary"><label class="text-md-center"><?php echo number_format($fetch['total'])?></label></h2>
                  </div>
                  </div>  
                </div>
              </div>

              <!-- Card end -->

<form method="POST">
  <label for="from">From</label>
<input type="text" id="from" name="from" value="<?php echo $fromdate ?>" required>
<label for="to">to</label>
<input type="text" id="to" name="to" value="<?php echo $todate ?>" required>
<button name="submit" class="btn btn-success text-white btn-xs">Filter</button>
</form><br><br>

   <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
  <strong class="card-title" style="color:#191978;"><i class="ti-shopping-cart"></i>  Total Purchase List</strong>
                    </div>
                    <div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem;padding-bottom: 1rem;">
           <table id="customer_data" class="table table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Id</th>
                                    <th>Party Id</th>
                                    <th>item Id</th>
                                    <th>Category Id</th>
                                    <th>Store Id</th>
                                    <th>Quantity</th>
                                    <th>Balance</th>
                                    <th>Timestamp</th>
                                    <th>Total_price</th>
                                   
                                </tr>
    <tbody>  
   
    <?php

    $query = mysqli_query($conn, "SELECT SUM(total_price) AS total FROM `purchase`") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query);

     ?>   
 
<?php
$displayquery = "select * from purchase $sub_sql order by id desc";
$querydisplay = mysqli_query($conn , $displayquery);
foreach ($querydisplay as $row3) {
  $id = $row3['id'];
   $timestamp = $row3['timestamp'];

  $original_date = $timestamp;
$timestamp = strtotime($original_date);
$new_date = date("d-M-Y h:i:s a", $timestamp);
  ?>
  <tr class="text-center">
  <td>
   <?php echo $row3['id'];?>
 </td>
   <td>
   <?php echo "PRT".$row3['party_id'];?>
   </td>
    <td>  
       <?php echo "ITM".$row3['item_id'];?>
        </td>
         <td>  
       <?php echo "CTG".$row3['category_id'];?>
        </td>
         <td>  
       <?php echo "STR".$row3['store_id'];?>
        </td>
         <td>  
       <?php echo $row3['quantity'];?>
        </td>
          <td>  
       <?php echo $row3['balance'];?>
        </td>
          <td>  
       <?php echo $new_date?>
        </td>
         <td>  
       <?php echo "&#8377; ".$row3['total_price'];?>
        </td>
      </tr>


<?php 
}
?>   

  </tbody>

                            </thead>

                             <tr> 
                             <td colspan="8" class="text-danger text-center">Total Price</td>
                              <td class="text-danger">
             <?php echo "&#8377; ".$fetch['total']?>
     </td>
        </tr>
                         
                        </table>
                    </div>
                </div>
            </div>
        </div>
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


  <?php 
include("check.php");
?>
  <?php
include("header.php");
include("connect.php");
$displayquery = "select * from settings";
$querydisplay = mysqli_query($conn , $displayquery);
  ?>
  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Setting</h3>
                </div>
                <div>
      <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Setting</li>
  </ol>
</nav>
                </div>
              </div>
            </div>
          </div>
<?php echo "<a href='#' class='add_btn btn btn-success btn-xm text-white ti-plus'> Add</a>";
           ?>
<br><br>

<div class="card">
<div class="card-block">
<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap text-center">
<thead>
                <tr> 
                     <th>Id</th>
                      <th>Name</th>
                    <th>Value</th>
                     <th>Action</th>
                </tr>
                  </thead>
                <tbody>            
<?php

foreach ($querydisplay as $row3) {
  $id = $row3['id']; 
  ?>
  <tr>
 <td class="party_string">
   <?php echo $row3['id'];?>
   </td>
    <td>
   <?php echo $row3['name'];?>
   </td>
    <td>
   <?php echo $row3['value'];?>
   </td>
   <td>
  <button class="edit_data btn btn-info btn-xs text-white" id="<?php echo $row3['id'];?>"> <i class="ti-pencil-alt "></i></button>
  <button class="del_data btn btn-danger btn-xs text-white" id="<?php echo $row3['id'];?>"><i class="ti-trash icon-md"></i></button>
  </td>
      </tr>
</div></div></div>
<?php 
}
?>    

<!--View Modal -->
<div class="modal fade" id="storeviewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Data</h5>
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
  </div>

    <!-- ADD Modal -->

<div class="modal fade" id="adddata" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
         <form action="" method="post" id="addForm">
        <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Add String and Data </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="add_update"> 
         
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary text-white" name="added" id="added">Add</button>
      </div>

       </form>
    </div>
  </div>
</div>

<!-- END ADD MODEL -->
<!-- start ADD Modal -->

 <script>   
      $(document).on('click', '.add_btn', function(){
        var edit_id=$(this).attr('id');
        $.ajax({
            url:"setting_add.php",
            type:"post",
            data:$("#addForm").serialize(),
            success:function(data){
                $("#add_update").html(data);
                $("#adddata").modal('show');
            }
        });
      });

   
   $(document).on('click', '#added', function(){
    $.ajax({
        url:"add_Update.php",
        type:"post",
        data:$("#addForm").serialize(),
        success:function(data){
            $("#adddata").modal('hide');
            location.reload();
        }
    });
   });
 

</script>
<!-- ADD MODAL END -->

    <!-- Edit Modal -->
<div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
         <form action="" method="post" id="updateForm">
        <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="info_update"> 
         
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary text-white" name="update" id="update">update</button>
      </div>

       </form>
    </div>
  </div>
</div>


    <!-- delete Modal -->
<div class="modal fade" id="deldata" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
         <form action="" method="post" id="delForm">
        <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Delete </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="info_del"> 
         
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary text-white" name="del" id="del">Delete</button>
      </div>

       </form>
    </div>
  </div>
</div>
<!-- end delete Modal -->





<!-- start Edit Modal -->

 <script>   
      $(document).on('click', '.edit_data', function(){
        var edit_id=$(this).attr('id');
        $.ajax({
            url:"setting_edit.php",
            type:"post",
            data:{edit_id:edit_id},
            success:function(data){
                $("#info_update").html(data);
                $("#editdata").modal('show');
            }
        });
      });

   
   $(document).on('click', '#update', function(){
    $.ajax({
        url:"save_Update.php",
        type:"post",
        data:$("#updateForm").serialize(),
        success:function(data){
            $("#editdata").modal('hide');
            location.reload();
        }
    });
   });
 

</script>

<!-- delete -->

 <script>   
      $(document).on('click', '.del_data', function(){
        var del_id=$(this).attr('id');
        $.ajax({
            url:"del_data.php",
            type:"post",
            data:{del_id:del_id},
            success:function(data){
                $("#info_del").html(data);
                $("#deldata").modal('show');
            }
        });
      }); 



   $(document).on('click', '#del', function(){
    $.ajax({
        url:"save_del.php",
        type:"post",
        data:$("#delForm").serialize(),
        success:function(data){
            $("#deldata").modal('hide');
            location.reload();
        }
    });
   });

      </script>




      <!-- Item Qantity start-->
</div></div>
  <br><br>     
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0 d-flex justify-content-between align-items-center" style="color:#191978;">Item Quantity type</h3>
                </div>
                <div>
                </div>
              </div>
        <br> 
        <?php echo "<a href='#' class='add_btnq btn btn-success btn-xm text-white'>Add</a>";
           ?><br><br>


<!-- ADD MODEL QUANTITY -->

<div class="modal fade" id="adddataq" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
         <form action="" method="post" id="addFormq">
        <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Add Item Quantity </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="add_updateq"> 
         
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary text-white" name="addedq" id="addedq">Add</button>
      </div>

       </form>
    </div>
  </div>
</div>

<!-- start ADD Modal -->

 <script>   
      $(document).on('click', '.add_btnq', function(){
        var edit_id=$(this).attr('id');
        $.ajax({
            url:"setting_addq.php",
            type:"post",
            data:$("#addFormq").serialize(),
            success:function(data){
                $("#add_updateq").html(data);
                $("#adddataq").modal('show');
            }
        });
      });

   
   $(document).on('click', '#addedq', function(){
    $.ajax({
        url:"add_Updateq.php",
        type:"post",
        data:$("#addFormq").serialize(),
        success:function(data){
            $("#adddataq").modal('hide');
            location.reload();
        }
    });
   });
 

</script>
<!-- ADD MODAL END -->

<!-- END ADD MODEL QUANTITY -->



<div class="card">
<div class="card-block">
<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap text-center">
<thead>
                <tr> 
                     <th>Id</th>
                    <th>Item Quantity Type</th>
                    <th>Action</th>
                 
                </tr>
                  </thead>
                <tbody>            
<?php

$displayquery = "select * from item_unit";
$querydisplay = mysqli_query($conn , $displayquery);
foreach ($querydisplay as $row3) {
  $id = $row3['id']; 
  ?>
  <tr>
 <td>
   <?php echo $row3['id'];?>
   </td>
    <td>
   <?php echo $row3['item_unit'];?>
   </td>
   <td>
      <button class="edit_data_item btn btn-info btn-xs text-white" id="<?php echo $row3['id'];?>"><i class="ti-pencil-alt "></i></button>
  <button class="del_dataqq btn btn-danger btn-xs text-white" id="<?php echo $row3['id'];?>"><i class="ti-trash "></i></button>
   </td>
      </tr>
<?php 
}
?>    </tbody></table></div></div></div>



    <!-- Edit Modal item-->
<div class="modal fade" id="editdataitem" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
         <form action="" method="post" id="updateFormitem">
        <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Item Quantity Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="info_update_item"> 
         
           </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary text-white" name="update_item" id="update_item">update</button>
      </div>

       </form>
    </div>
  </div>
</div>



<!-- start Edit Modal -->

 <script>   
      $(document).on('click', '.edit_data_item', function(){
        var edit_id=$(this).attr('id');
        $.ajax({
            url:"setting_edit_item.php",
            type:"post",
            data:{edit_id:edit_id},
            success:function(data){
                $("#info_update_item").html(data);
                $("#editdataitem").modal('show');
            }
        });
      });

   
   $(document).on('click', '#update_item', function(){
    $.ajax({
        url:"save_Update_item.php",
        type:"post",
        data:$("#updateFormitem").serialize(),
        success:function(data){
            $("#editdataitem").modal('hide');
            location.reload();
        }
    });
   });
 

</script>


<!-- Edit model end -->

  <!-- delete Modal -->
<div class="modal fade" id="deldataqq" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
         <form action="" method="post" id="delFormqq">
        <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Delete </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="info_delqq"> 
         
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary text-white" name="delqq" id="delqq">Delete</button>
      </div>

       </form>
    </div>
  </div>
</div>
 <script>   
      $(document).on('click', '.del_dataqq', function(){
        var del_idqq=$(this).attr('id');
        $.ajax({
            url:"del_dataqq.php",
            type:"post",
            data:{del_idqq:del_idqq},
            success:function(data){
                $("#info_delqq").html(data);
                $("#deldataqq").modal('show');
            }
        });
      }); 



   $(document).on('click', '#delqq', function(){
    $.ajax({
        url:"save_delqq.php",
        type:"post",
        data:$("#delFormqq").serialize(),
        success:function(data){
            $("#deldataqq").modal('hide');
            location.reload();
        }
    });
   });

      </script>
<!-- end delete Modal -->


<!-- State Code Start -->

  <!-- state code start-->
</div></div>
  <br><br>     
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0 d-flex justify-content-between align-items-center" style="color:#191978;">State Code</h3>
                </div>
                <div>
                </div>
              </div>
        <br> 
        <?php echo "<a href='#' class='add_btns btn btn-success btn-xm text-white'>Add</a>";
           ?><br><br>



<div class="card">
<div class="card-block">
<div class="table-responsive pt-3"
                        style="overflow-x: auto; padding-left: 1rem; padding-right: 1rem;">
<table id="customer_data" class="table table-striped table-bordered nowrap text-center">
<thead>
                <tr> 
                     <th>Id</th>
                    <th>State Name</th>
                    <th>State Code</th>
                    <th>State Short Name</th>
                    <th>Action</th>
                 
                </tr>
                  </thead>
                <tbody>            
<?php

$displayquery = "select * from state_code";
$querydisplay = mysqli_query($conn , $displayquery);
foreach ($querydisplay as $row3) {
  $id = $row3['id']; 
  ?>
  <tr>
 <td>
   <?php echo $row3['id'];?>
   </td>
    <td>
   <?php echo $row3['state_name'];?>
   </td>
   <td>
   <?php echo $row3['state_code'];?>
   </td>
   <td>
   <?php echo $row3['state_short_name'];?>
   </td>
   <td>
       <button class="edit_data_state btn btn-info btn-xs text-white" id="<?php echo $row3['id'];?>"><i class="ti-pencil-alt "></i></button>
  <button class="del_datass btn btn-danger btn-xs text-white" id="<?php echo $row3['id'];?>"><i class="ti-trash "></i></button>

   </td>
   
      </tr>
<?php 
}
?>    </tbody></table></div></div></div>



<!-- ADD state code -->

<div class="modal fade" id="adddatas" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
         <form action="" method="post" id="addForms">
        <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Add State </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="add_updates"> 
         
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary text-white" name="addeds" id="addeds">Add</button>
      </div>

       </form>
    </div>
  </div>
</div>


<!-- start ADD state code Modal -->

 <script>   
      $(document).on('click', '.add_btns', function(){
        var edit_id=$(this).attr('id');
        $.ajax({
            url:"setting_adds.php",
            type:"post",
            data:$("#addForms").serialize(),
            success:function(data){
                $("#add_updates").html(data);
                $("#adddatas").modal('show');
            }
        });
      });

   
   $(document).on('click', '#addeds', function(){
    $.ajax({
        url:"add_Updatess.php",
        type:"post",
        data:$("#addForms").serialize(),
        success:function(data){
            $("#adddatas").modal('hide');
            location.reload();
        }
    });
   });
 

</script>
<!-- END STATE CODE MODAL -->


<!-- delete State code Modal start -->
<div class="modal fade" id="deldatass" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
         <form action="" method="post" id="delFormss">
        <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Delete state </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="info_delss"> 
         
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary text-white" name="delss" id="delss">Delete</button>
      </div>

       </form>
    </div>
  </div>
</div>
 <script>   
      $(document).on('click', '.del_datass', function(){
        var del_idss=$(this).attr('id');
        $.ajax({
            url:"del_datass.php",
            type:"post",
            data:{del_idss:del_idss},
            success:function(data){
                $("#info_delss").html(data);
                $("#deldatass").modal('show');
            }
        });
      }); 



   $(document).on('click', '#delss', function(){
    $.ajax({
        url:"save_delss.php",
        type:"post",
        data:$("#delFormss").serialize(),
        success:function(data){
            $("#deldatass").modal('hide');
            location.reload();
        }
    });
   });

      </script>
<!-- end delete state code  Modal -->


  <!-- Edit STATE CODE Modal START-->
<div class="modal fade" id="editdatastate" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
         <form action="" method="post" id="updateFormstate">
        <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="info_update_state"> 
         
           </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary text-white" name="update_state" id="update_state">update</button>
      </div>

       </form>
    </div>
  </div>
</div>



<!-- start Edit Modal -->

 <script>   
      $(document).on('click', '.edit_data_state', function(){
        var edit_id=$(this).attr('id');
        $.ajax({
            url:"setting_edit_state.php",
            type:"post",
            data:{edit_id:edit_id},
            success:function(data){
                $("#info_update_state").html(data);
                $("#editdatastate").modal('show');
            }
        });
      });

   
   $(document).on('click', '#update_state', function(){
    $.ajax({
        url:"save_Update_state.php",
        type:"post",
        data:$("#updateFormstate").serialize(),
        success:function(data){
            $("#editdatastate").modal('hide');
            location.reload();
        }
    });
   });
 

</script>


<!-- Edit STATE CODE model end -->
<!--State Code End  -->


<!-- Home Page Update -->

<br><br>

<!-- Desktop view logo -->
<?php 
 if(isset($_GET['id']))
    {
      $id = $_GET['id']; 
    }
      $query="SELECT * FROM landing_page WHERE id=1";
      $view_users= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_users))
        {
           $id = $row['id'];
           $logo = $row['logo'];
        }

if(isset($_POST['btn']))
{

    $ppic = $_FILES["profilepic"]["name"];
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
$allowed_extensions = array(".jpg",".JPG","jpeg",".png");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png / format allowed');</script>";
}
if($_FILES["profilepic"]["size"] > 500000) {
    echo '<script>alert("Image size exceeds 500kb")</script>';
        }
else
{
$imgnewfile=md5($ppic).time().$extension;
move_uploaded_file($_FILES["profilepic"]["tmp_name"],'upload/'.$imgnewfile);
     $result_img = "update landing_page SET logo='$imgnewfile' where id=1";
     $query = mysqli_query($conn,$result_img); 
     echo '<script>alert("Logo added Successfully")</script>';
      echo "<script> window.location.href='Setting';</script>";
  }
}
?>
<!--Desktop view end logo  -->
 <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0 d-flex justify-content-between align-items-center" style="color:#191978;">Website Logo Update</h3>
                </div>
                <div>
                </div>
              </div><br><br>
<div class="col-md-5">
<form action="" role="form" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="required">Website Logo </label>
        <img src="upload/<?php echo $logo ?>" style="width:100px;height:100px;" alt="logo" />
        <br><br>
          <div class="form-group">
    <input type="file" class="form-control" required  name="profilepic" id="upload_file" onchange="getImagePreview(event)">
     <span style="color:red; font-size:12px;">Only jpg / jpeg/ png / format, less than 500kb allowed .</span>
  </div>
   <div id="preview"></div>
   </div></div>  
        <div class="col-lg-12">
       <button type="submit" class="btn btn-success text-white" name="btn"> Update </button>
       <a href="home" class="btn btn-default" role="button">Cancel</a>
    </div>
</form>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  function getImagePreview(event){
    var image=URL.createObjectURL(event.target.files[0]);
     var imagediv = document.getElementById('preview');
     var newimg = document.createElement('img');
     imagediv.innerHTML='';
     newimg.src=image;
     newimg.width="100";
     imagediv.appendChild(newimg);
  }
</script>

<!-- End home page Update -->

<!-- Admin Profile  -->

<?php 
 if(isset($_GET['id']))
    {
      $id = $_GET['id']; 
    }
      $query="SELECT * FROM landing_page WHERE id=2";
      $view_users= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_users))
        {
           $id = $row['id'];
           $logonew = $row['logo'];
        }

if(isset($_POST['btn1']))
{

    $ppic = $_FILES["profilepicnew"]["name"];
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
$allowed_extensions = array(".jpg",".JPG","jpeg",".png");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png / format allowed');</script>";
}
if($_FILES["profilepicnew"]["size"] > 100000) {
    echo '<script>alert("Image size exceeds 100kb")</script>';
        }
else
{
$imgnewfile=md5($ppic).time().$extension;
move_uploaded_file($_FILES["profilepicnew"]["tmp_name"],'upload/'.$imgnewfile);
     $result_img = "update landing_page SET logo='$imgnewfile' where id=2";
     $query = mysqli_query($conn,$result_img); 
     echo '<script>alert("Admin image added Successfully")</script>';
      echo "<script> window.location.href='Setting';</script>";
  }
}
?>
<!--Desktop view end logo  -->
 <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0 d-flex justify-content-between align-items-center" style="color:#191978;">Admin image Update</h3>
                </div>
                <div>
                </div>
              </div><br><br>
<div class="col-md-5">
<form action="" role="form" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="required">Admin Image </label>
        <img src="upload/<?php echo $logonew ?>" style="width:100px;height:100px;" alt="logo" />
        <br><br>
          <div class="form-group">
    <input type="file" class="form-control" required  name="profilepicnew" id="upload_file" onchange="getImagePreview(event)">
     <span style="color:red; font-size:12px;">Only jpg / jpeg/ png / format, less than 100kb allowed.</span>
  </div>
   <div id="previewnew"></div>
   </div></div>  
        <div class="col-lg-12">
       <button type="submit" class="btn btn-success text-white" name="btn1"> Update </button>
       <a href="home" class="btn btn-default" role="button">Cancel</a>
    </div>
</form>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  function getImagePreview(event){
    var image=URL.createObjectURL(event.target.files[0]);
     var imagediv = document.getElementById('previewnew');
     var newimg = document.createElement('img');
     imagediv.innerHTML='';
     newimg.src=image;
     newimg.width="100";
     imagediv.appendChild(newimg);
  }
</script>
<!-- admin Profile end -->

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
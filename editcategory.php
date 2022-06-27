<?php 
include("check.php");
include("header.php");
include("connect.php");
 ?>
  <?php
   if(isset($_GET['id']))
    {
      $id = $_GET['id']; 
    }
      $query="SELECT * FROM category WHERE id = $id";
      $view_users= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_users))
        {
           $id = $row['id'];
           $image = $row['image'];
          $name = $row['name'];
          $status = $row['status'];
        }

    if(isset($_POST['btn'])) 
    {    
        $name =mysqli_real_escape_string($conn,$_POST['name']);
         $status = mysqli_real_escape_string($conn,$_POST['status']);

      $query = "UPDATE category SET name = '$name',status='$status' WHERE id = $id";
      $update_user = mysqli_query($conn, $query);
      echo "<script type='text/javascript'>alert('Category updated successfully!')</script>";
       echo "<script> window.location.href='Category';</script>";
    }     
?>  
 

<?php  
      $id = $_GET['id']; 
    
    $query="SELECT * FROM category WHERE id = '$id'";
      $view_users= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_users))
        {
           $id = $row['id'];
           $image = $row['image'];
          $name = $row['name'];
          $status = $row['status'];

          ?>
  
       <style type="text/css">
  .required:after{
    content:"*";
    color: red;
  }
</style>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Edit Category</h3>
                </div>
                <div>
                   <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
  </ol>
</nav>  
                </div>
              </div>
            </div>
          </div>
          <div class="row">   
<div class="col-md-6">
<form action="" role="form" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="required">Category</label>
          <div class="form-group">
            <img src="upload/<?php  echo $row['image'];?>" width="120" height="120">
<a href="changepic?id=<?php echo $row['id'];?>">Change Image</a>
  </div>
   <div id="preview"></div>
       </div></div>
    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="required">Category Name</label>
                          <div class="col-sm-9">
     <input type="text" class="form-control" name="name" required  pattern="[a-zA-Z\s]{1,35}" value="<?php echo $name ?>" placeholder="Ex@ Mobile,Laptop">
    </div></div></div></div>

  <div class="col-md-6">
      <div class="form-group row">
      <label class="required">Status</label>
       <div class="col-sm-9">
  <select class="form-select" name="status" required aria-label="Default select example">
  <option selected><?php echo $status ?></option>
  <option value="1">Active</option>
  <option value="2">Inactive</option>
</select>
</div></div></div>
        <div class="col-lg-12">
       <button type="submit" class="btn btn-success text-white" name="btn"> Update </button>
        <a href="Category" class="btn btn-default" role="button">Cancel</a>
    </div>
</form>
<?php 
} 
?>

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
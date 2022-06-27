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
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Search : <?Php echo $_GET['str']; ?> </h3>
                </div>
                <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Search</li>
  </ol>
</nav>
              </div>
            </div>
          </div>        
<?php
if(isset($_GET['submit']))
{
  $search_term =$_GET['str'];

 $displayquery = "select * from party where name LIKE '%{$search_term}%'";

 $res = mysqli_query($conn , $displayquery);

 if(mysqli_num_rows($res)>0){
 while ($row=mysqli_fetch_assoc($res)) {
?>   
<div class="">
<div class="table-responsive ">
<table id="" class="table table-bordered table-hover">
<thead> 
                <tr>            
                 <th>id</th>
                  <th>Name</th>  
                   <th>Address</th>
                    <th>mobile</th>
                    <th>email</th>
                     <th>GST No</th>
                      <th>state_code</th>
                       <th>Balance</th>
                       <th>Status</th>  
                </tr>
                  </thead>
                <tbody> 
  <tr>

     <th scope="row"><?php echo $row["id"]; ?></th>  
   <td>
   <?php echo $row['name'];?>
   </td>
    <td>
   <?php echo $row['address'];?>
   </td>
    <td> 
       <?php echo $row['mobile'];?>
        </td>
         <td> 
       <?php echo $row['email'];?>
        </td>
         <td> 
       <?php echo $row['gst_number'];?>
        </td>
         <td> 
       <?php echo $row['state_id'];?>
        </td>
        <td> 
       <?php echo $row['balance'];?>
        </td>
        <td> 
       <?php echo $row['status'];?>
        </td>
      </tr>
      <?php  echo "<br>" ?>
  <?php
 }
 }
 else{
  echo '<img src="images/record.png" alt="">'."<br><br>"."<h1>No Record Found</h1>"."<br>".'<a href="home" title="" class="btn">Home page</a>';
 }
}
?>

</tbody></table></div></div>

<style type="text/css">
.btn{
    text-decoration: none;
  /*  color:#fff; */
   /*  margin-left:430px; */
   /*  font-size: 30px; */
  /*   background-color: #00B33A; */
    border-radius: 50px;
   /*  padding: 12px; */
}
.btn:hover{
/*   color: #fff; */
  /* background-color: #8ffc80; */
}
  h1{
   /*  margin-left:340px; */
    /* font-size: 40px; */
    /* color:#00B33A; */
  }
</style>
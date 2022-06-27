<?php
include("check.php");
  ?>                
<?php
include("connect.php");
if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['t']) && $_GET['t']!='');
{

 $id= mysqli_real_escape_string($conn,$_GET['id']);
  $id= mysqli_real_escape_string($conn,$_GET['t']);

  if($t == "store"){
     $sql = "select id, name from store where id='$id'";
  }elseif($t=="party"){
     $sql = "select id, name as name, from party where id='$id'";
  }else{
    header('location:index.php');
    die();
  }

  $res = mysqli_query($con ,$sql);

  if(mysqli_num_rows($res)>0){
    
    $row=mysqli_fetch_assoc($res);
    echo "<h2>" .$row['name']. "</h2>";

  }else{
    header('location:index.php');
    die();
  }

}
?>
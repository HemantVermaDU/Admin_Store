

<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
<!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php 
if(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
	 ?>

	 <script>
	swal({
  title: "<?php echo $_SESSION['status']; ?>",
  text: "<?php echo $_SESSION['status_code']; ?>",
  icon: "success",
  button: "Ok Done!",
});
</script>

<?php
	unset($_SESSION['status']);
}
?>
 -->

<!-- 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 -->
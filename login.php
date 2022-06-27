<?php
session_start();
?>
<?php
include 'db.php';
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email_search = " select * from student WHERE email='$email' ";
  $query = mysqli_query($con,$email_search);

  $email_count = mysqli_num_rows($query);

  if ($email_count) {
    $email_pass = mysqli_fetch_assoc($query);

    $db_pass = $email_pass['password'];

    $_SESSION['username'] = $email_pass['username'];

    $pass_decode = password_verify($password,$db_pass );
   
    if($pass_decode==1){

    	header("Location:mainpage.php");
      		exit();
         // echo " Login success";
      }
      else{
      	header("Location: login.php?error=Incorrect Password");
      		exit();
        // echo " password Incorrect";
      }
      }
    else{
     header("Location: login.php?error=Incorrect Email");
      		exit();
      		// echo "Email Incorrect";
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container_main">
	<div class="container">
		<div class="logo">
			<img src="logo.png" alt="logo">
		</div>
		<div class="title">
			Admin
		</div>
 <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" accept-charset="utf-8">   	
   
		<div class="form">
			<div class="username">
				<svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
						</svg>
				<input type="email" placeholder="Ex@gmail.com" required name="email">
			</div>

			<div class="password">
				<svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
						</svg>
				<input type="password" placeholder="password" required name="password">
			</div>

			<button class="signin-btn" name="submit">Login</button>

				<?php 
			if(isset($_GET['error'])){
				?>
				<p class="error"> <?php echo $_GET['error']; ?></p>
				<?php
			}
		?>

 </form>
		</div>
	</div>
</div>


<script>
	let colors=[
	'#74b9ff',
	'#ff7675',
	'#fd79a8',
	'#fdcb6e',
	'#55efc4',
	'#fd9644'
	]
	function createElement(){
		let container =document.querySelector('.container_main')
		let span =document.createElement('span');

		var size= Math.random() * 50;
		let bg =colors[Math.floor(Math.random() * colors.length)];

		span.style.height= 50 + size + 'px';
		span.style.width= 50 + size + 'px';
		span.style.top = Math.random() * innerHeight + 'px';
		span.style.left = Math.random() * innerWidth + 'px';
		span.style.background=bg;

		container.appendChild(span);

		setTimeout(() =>{
			span.remove()
		},5000);
	}
	setInterval(createElement,150);
</script>
</body>
</html>
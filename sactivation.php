<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<script type="text/javascript">
			document.addEventListener('contextmenu', event => event.preventDefault());
		</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Smart Career</title>
  </head>
	<body>
	<?php
		$servername = "127.0.0.1";
		$username = "root";
		$password = "$@!Sai5171";
		$database = "hackindia";
		$con =  mysqli_connect($servername, $username, $password,$database);
	  $activation = $_GET['activation'];
	  $aadhar = $_GET['aadhar'];
	  $extract = mysqli_query($con,"SELECT * FROM users where aadhar='$aadhar' and activation='$activation'");
	  $count = mysqli_num_rows($extract);
	  if($count == 1)
	  {
	    $extract = mysqli_query($con,"UPDATE users SET activation = '1' where aadhar='$aadhar'");
			echo "<br><div class='container'>";
				echo "<div class='alert alert-success alert-dismissable'>
					<a class='close' data-dismiss='alert' aria-label='close'>×</a>
					<strong>Your account has been successfully activated. You will be redirected to home page within 5 seconds.</strong>
				</div>";
			echo "</div><br>";
	    header('Refresh: 5;url=home');
	  }
	  else
	  {
			echo "<br><div class='container'>";
				echo "<div class='alert alert-danger alert-dismissable'>
					<a class='close' data-dismiss='alert' aria-label='close'>×</a>
					<strong>link doesn't exits. You will be redirected to home page within 5 seconds.</strong>
				</div>";
			echo "</div><br>";
			header('Refresh: 5;url=home');
	  }
	  mysqli_close($con);
	?>
	</body>
</html>

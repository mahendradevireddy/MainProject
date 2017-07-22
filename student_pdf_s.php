<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $email = $_SESSION['email'];

	$type = $_POST['type'];
	$file_size = $_FILES['pdf']['size'];

	$imagetmp = addslashes (file_get_contents($_FILES['pdf']['tmp_name']));

	mysqli_query($con,"INSERT INTO pdf VALUES ('','$email','$type','$imagetmp')");
	$_SESSION['message']="Document  Uploaded Successfully.";
	header("location: student_thesis.php");

	mysqli_close($con);
?>

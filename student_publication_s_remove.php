<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $email = $_SESSION['email'];
  $extract = mysqli_query($con,"delete from student_publication where email='$email'");
  mysqli_close($con);
?>

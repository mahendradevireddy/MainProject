<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $email = $_POST['email'];
  $check = "0";
  $extract = mysqli_query($con,"select * from admin where email='$email'");
  $count = mysqli_num_rows($extract);
  if($count)
    $check = "1";
  $extract = mysqli_query($con,"select * from users where email='$email'");
  $count = mysqli_num_rows($extract);
  if($count)
    $check = "1";
  $extract = mysqli_query($con,"select * from institution where email='$email'");
  $count = mysqli_num_rows($extract);
  if($count)
    $check = "1";
  echo $check;
  mysqli_close($con);
?>

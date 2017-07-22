<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
	$guide = $_POST['guide'];
  $cid = $_SESSION['cid'];
  $name = $guide[0];
  $designation = $guide[1];
  $email = $guide[2];
  $specialization = $guide[3];
  $gid = $cid."G".$guide[4];
  $extract = mysqli_query($con,"insert into research_guide values('','$cid','$gid','$name','$designation','$email','$specialization')");
  mysqli_close($con);
?>

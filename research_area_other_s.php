<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
	$area = $_POST['area'];
  $cid = $_SESSION['cid'];
  $extract = mysqli_query($con,"delete from research_area where cid='$cid' and stand='0'");
  foreach ($area as &$value) {
    $extract = mysqli_query($con,"insert into research_area values('','$cid','$value','0')");
  }
  mysqli_close($con);
?>

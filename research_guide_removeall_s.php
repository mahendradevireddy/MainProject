<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $cid = $_SESSION['cid'];
  $extract = mysqli_query($con,"delete from research_guide where cid='$cid'");
  mysqli_close($con);
?>

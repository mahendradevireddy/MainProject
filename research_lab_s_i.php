<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $cid = $_SESSION['cid'];
  $lab_namei = $_POST['lab_namei'];
  $instrument_name = $_POST['instrument_name'];
  $description = $_POST['description'];
  $year_of_install = $_POST['year_of_install'];
  $status = $_POST['status'];
  $extract = mysqli_query($con,"insert into research_lab_i values('','$cid','$lab_namei','$instrument_name','$description','$year_of_install','$status')");
  mysqli_close($con);
?>

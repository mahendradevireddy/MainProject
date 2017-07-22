<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $details = $_POST['details'];
  $decription = $_POST['decription'];
	$lastd = $_POST['lastd'];
  $doa = $_POST['doa'];
  $salary = $_POST['salary'];
  $exp = $_POST['exp'];
  $jobt = $_POST['jobt'];
  $ja = $_POST['ja'];
  $pw = $_POST['pw'];
  $vp = $_POST['vp'];
  $url = $_POST['url'];
  $vac = $_POST['vac'];
  $extract = mysqli_query($con,"INSERT INTO post VALUES ('','$details','$decription','$lastd','$doa','$salary','$exp','$jobt','$ja','$pw','$vp','$url','$vac')");
  $_SESSION['message'] = "Job/Vacancy posted successfully.";
  header("location: admin_post");
	mysqli_close($con);
?>

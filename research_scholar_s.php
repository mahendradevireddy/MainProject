<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $cid = $_SESSION['cid'];
  $name = $_POST['name'];
  $area = $_POST['area'];
  $roll = $_POST['roll'];
  $roll = strtoupper($roll);
  $guide = $_POST['guide'];
  $year = $_POST['year'];
  $status = $_POST['status'];
  $areaall = "";
  $i=0;
  foreach ($area as &$value) {
    $i++;
  }
  foreach ($area as &$value) {
    $i--;
    if($i==0)
      $areaall = $areaall."".$value;
    else
      $areaall = $areaall."".$value.",";
  }
  $guideall = "";
  $i=0;
  foreach ($guide as &$value) {
    $i++;
  }
  foreach ($guide as &$value) {
    $i--;
    if($i==0)
      $guideall = $guideall."".$value;
    else
      $guideall = $guideall."".$value.",";
  }
  mysqli_query($con,"insert into research_scholar values('','$cid','$name','$areaall','$roll','$guideall','$year','$status')");
  mysqli_close($con);
?>

<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $cid = $_SESSION['cid'];
  $csvFile = fopen($_FILES['file-1']['tmp_name'], 'r');
  fgetcsv($csvFile);
  while(($line = fgetcsv($csvFile)) !== FALSE){
    mysqli_query($con,"insert into research_scholar values('','$cid','$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]')");
    //echo $line[0]." ".$line[1]." ".$line[2]." ".$line[3]." ".$line[4]." ".$line[5]." ".$line[6];
    //echo "<br>";
  }
  $_SESSION['message'] = "Scholar details has been upload successfully.";
  header("location: research_scholar");
  mysqli_close($con);
?>

<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $email = $_SESSION['email'];
	$student = $_POST['student'];
  $title = $student[0];
  $status = $student[1];
  $inventor = $student[2];
  $number = $student[3];
  $description = $student[4];
  mysqli_query($con,"insert into student_patent values('','$email','$title','$status','$inventor','$number','$description')");
  mysqli_close($con);
?>

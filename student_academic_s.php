<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $email = $_SESSION['email'];
	$student = $_POST['student'];
  $degree = $student[0];
  $class = $student[1];
  $year = $student[2];
  $specialization = $student[3];
  $remarks = $student[4];
  mysqli_query($con,"insert into student_academic values('','$email','$degree','$class','$year','$specialization','$remarks')");
  mysqli_close($con);
?>

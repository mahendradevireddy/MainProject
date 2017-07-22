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
  $authors = $student[1];
  $name = $student[2];
  $issue = $student[3];
  $volume = $student[4];
  $year = $student[5];
  $start = $student[6];
  $end = $student[7];
  mysqli_query($con,"insert into student_publication values('','$email','$title','$authors','$name','$issue','$volume','$year','$start','$end')");
  mysqli_close($con);
?>

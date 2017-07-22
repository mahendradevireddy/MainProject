<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $thesis_title = $_POST['thesis_title'];
  $thesis_abs = $_POST['thesis_abs'];
  $email = $_SESSION['email'];
  $extract = mysqli_query($con,"select * from student_thesis where email='$email'");
  $count = mysqli_num_rows($extract);
  if($count == 0)
  {
    mysqli_query($con,"insert into student_thesis VALUES ('','$email','$thesis_title','$thesis_abs')");
  }
  else
  {
    mysqli_query($con,"update student_thesis set title='$thesis_title', abstract='$thesis_abs' where email='$email'");
  }
  $_SESSION['message']="Thesis details updated successfully.";
  header("location: student_thesis");
	mysqli_close($con);
?>

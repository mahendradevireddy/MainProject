<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $address = $_POST['address'];
  $dob = $_POST['dob'];
  $email = $_SESSION['email'];
  $extract = mysqli_query($con,"select * from student_personal where email='$email'");
  $count = mysqli_num_rows($extract);
  if($count == 0)
  {
    mysqli_query($con,"insert into student_personal VALUES ('','$email','$address','$dob')");
  }
  else
  {
    mysqli_query($con,"update student_personal set address='$address', dob='$dob' where email='$email'");
  }
  $_SESSION['message']="Personal details updated successfully.";
  header("location: student_personal");
	mysqli_close($con);
?>

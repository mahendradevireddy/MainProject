<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
	$Email = $_POST['Email'];
	$password = md5($_POST['password']);
  //institution
  $extract = mysqli_query($con,"select * from institution where email='$Email' and pass='$password'");
  $count = mysqli_num_rows($extract);
  $row = mysqli_fetch_assoc($extract);
  //user
  $extract = mysqli_query($con,"select * from users where email='$Email' and pass='$password'");
  $count1 = mysqli_num_rows($extract);
  $row1 = mysqli_fetch_assoc($extract);
  //admin
  $extract = mysqli_query($con,"select * from admin where email='$Email' and pass='$password'");
  $count2 = mysqli_num_rows($extract);
  $row2 = mysqli_fetch_assoc($extract);
  //company
  $extract = mysqli_query($con,"select * from company_lab where email='$Email' and pass='$password'");
  $count3 = mysqli_num_rows($extract);
  $row3 = mysqli_fetch_assoc($extract);
  //institution activated
  if($count==1 && $row['activation']=='1')
  {
    $_SESSION['cid'] = $row['cid'];
    header("location: research_area");
  }
  //institution not activated
  else if($count==1 && $row['activation']!='1')
  {
    $_SESSION['message'] = "Please activate your account and try again.";
    header("location: home");
  }
  //user activated
  else if($count1==1 && $row1['activation']=='1')
  {
    $_SESSION['email'] = $row1['email'];
    header("location: student_activation");
  }
  //user not activated
  else if($count1==1 && $row1['activation']!='1')
  {
    $_SESSION['message'] = "Please activate your account and try again.";
    header("location: home");
  }
  //admin activated
  else if($count2==1 && $row2['activation']=='1')
  {
    $_SESSION['admin'] = $row2['email'];
    header("location: admin");
  }
  //admin not activated
  else if($count2==1 && $row2['activation']!='1')
  {
    $_SESSION['message']="Please activate your account and try again.";
    header("location: home");
  }
  //company activated
  else if($count3==1 && $row3['activation']=='1')
  {
    $_SESSION['admin'] = $row3['email'];
    $_SESSION['company_name'] = $row3['name'];
    header("location: admin");
  }
  //company not activated
  else if($count3==1 && $row3['activation']!='1')
  {
    $_SESSION['message']="Please activate your account and try again.";
    header("location: home");
  }
  else
  {
    $_SESSION['message'] = "Sorry, Email or password is invalid.";
    header("location: home");
  }
	mysqli_close($con);
?>

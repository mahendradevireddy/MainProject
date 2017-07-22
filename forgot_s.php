<?php
  $servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "hackindia";
  $con =  mysqli_connect($servername, $username, $password,$database);
  $from = "From: saikirannikhil007@gmail.com"."\r\n";
  $email = $_POST['email'];
  $subject= "Password Recovery - Smart Career";
  $password = randomPassword();
  $passworde = md5($password);
  $msg = "You have requested a password change for Smart Career\n\nThe new password is ".$password;
  echo "<script>console.log('mail');</script>";

  $extract = mysqli_query($con,"select * from admin where email='$email'");
  $count = mysqli_num_rows($extract);
  if($count)
    mysqli_query($con,"update admin set pass='$passworde' where email='$email'");

  $extract = mysqli_query($con,"select * from users where email='$email'");
  $count = mysqli_num_rows($extract);
  if($count)
    mysqli_query($con,"update users set pass='$passworde' where email='$email'");

  $extract = mysqli_query($con,"select * from institution where email='$email'");
  $count = mysqli_num_rows($extract);
  if($count)
    mysqli_query($con,"update institution set pass='$passworde' where email='$email'");

  mail($email,$subject,$msg,$from);
  function randomPassword()
  {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array();
	    $alphaLength = strlen($alphabet) - 1;
	    for ($i = 0; $i < 12; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass);
	}
  mysqli_close($con);
?>

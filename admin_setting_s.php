<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  if(isset($_POST['register_btn']))
  {
    $opass = $_POST['opass'];
    $opasse = md5($opass);
    $npass = $_POST['npass'];
    $rnpass = $_POST['rnpass'];
  	$email = $_SESSION['admin'];
    $extract = mysqli_query($con,"select * from admin where email='$email' and pass='$opasse'");
    $count = mysqli_num_rows($extract);
    if($count==0)
    {
      $_SESSION['message'] = "Old Password is wrong.";
      header("location: admin_setting");
    }
    else if($opass==$npass)
    {
      $_SESSION['message']="It's seems your new password matches with the current password!";
      header("location: admin_setting");
    }
    else
    {
      $passworde = md5($npass);
      $extract = mysqli_query($con,"update admin set pass='$passworde' where email='$email'");
      $_SESSION['message'] = "Password updated successfully.";
      header("location: admin_setting");
    }
  }
  else if(isset($_POST['register_btn1']))
  {
    $email = $_SESSION['admin'];
    $file_size = $_FILES['file-1']['size'];
    if($file_size > 153600)
		{
			$_SESSION['message'] = "File too large. File must be less than 150 kilobytes.";
			header("location: admin_setting");
		}
		else if(getimagesize($_FILES['file-1']['tmp_name']) == FALSE )
		{
			$_SESSION['message'] = "Please select an image.";
			header("location: admin_setting");
		}
    else
    {
      $imagetmp = addslashes (file_get_contents($_FILES['file-1']['tmp_name']));
      mysqli_query($con,"update admin SET image='$imagetmp' WHERE email='$email'");
      $_SESSION['message'] = "Profile pic successfully updated.";
      header("location: admin_setting");
    }
  }
	mysqli_close($con);
?>

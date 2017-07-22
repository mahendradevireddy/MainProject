<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
	if(isset($_POST['register_btn']))
	{
		$Email = $_POST['Email'];
		$password = $_POST['spassword'];
		$aadhar = $_POST['aadhar'];
		$phone = $_POST['phone'];
		$named = $_POST['named'];
		$namef = $_POST['namef'];
		$namem = $_POST['namem'];
		$namel = $_POST['namel'];
		$sex = $_POST['sex'];
		$nationality = $_POST['nationality'];
		$file_size = $_FILES['file-1']['size'];
		$extract = mysqli_query($con,"select * from users where aadhar='$aadhar'");
		$count = mysqli_num_rows($extract);
		if($count == 1)
		{
			$_SESSION['message'] = "Aadhar number is already registered.";
			header("location: register");
		}
		else
		{
			if($file_size > 153600)
			{
				$_SESSION['message'] = "File too large. File must be less than 150 kilobytes.";
				header("location: register");
			}
			else if(getimagesize($_FILES['file-1']['tmp_name']) == FALSE )
			{
				$_SESSION['message'] = "Please select an image.";
				header("location: register");
			}
			else
			{
				$passworde = md5($_POST['spassword']);
				$imagetmp = addslashes (file_get_contents($_FILES['file-1']['tmp_name']));
				$activation = randomactivation();
				mysqli_query($con,"INSERT INTO users VALUES ('$aadhar','$Email','$passworde','$phone','$named','$namef','$namem','$namel','$sex','$nationality','$imagetmp','$activation','0')");
				$subject = "Registration - Smart Career";
				$msg = "Hello ".$namef."\n\nThank you for registering with Smart Career. Click on the below link to activate your account.\n http://35.154.87.54/sactivation?activation=".$activation."&aadhar=".$aadhar;
				$from = "From: saikirannikhil007@gmail.com"."\r\n";
				mail($Email,$subject,$msg,$from);
				$_SESSION['message']="Successfully registered. An activation mail has been send to your email id. Click on the activation link given in the mail to activate your account.";
				header("location: register");
			}
		}
	}
	mysqli_close($con);
	function randomactivation()
	{
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array();
	    $alphaLength = strlen($alphabet) - 1;
	    for ($i = 0; $i < 25; $i++)
			{
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass);
	}
?>

<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
	$institution_name = $_POST['institution_name'];
	$address = $_POST['address'];
	$named = $_POST['named'];
	$namef = $_POST['namef'];
	$namem = $_POST['namem'];
	$namel = $_POST['namel'];
	$Email = $_POST['Email'];
	$password = $_POST['ipassword'];
	$phone = $_POST['phone'];
	$file_size = $_FILES['file-2']['size'];
	$code = $_POST['state'];
	$extract = mysqli_query($con,"select * from institution where email='$Email'");
	$count = mysqli_num_rows($extract);
	if($count == 1)
	{
		$_SESSION['message'] = "email id is already registered.";
		header("location: register");
	}
	else
	{
		if($file_size > 153600)
		{
			$_SESSION['message'] = "File too large. File must be less than 150 kilobytes.";
			header("location: register");
		}
		else if(getimagesize($_FILES['file-2']['tmp_name']) == FALSE )
		{
			$_SESSION['message'] = "Please select an image.";
			header("location: register");
		}
		else
		{
			$passworde = md5($_POST['ipassword']);
			$imagetmp = addslashes (file_get_contents($_FILES['file-2']['tmp_name']));
			$activation = randomactivation();
			$temp = explode(" ",$institution_name);
			$id = "";
			for($i=0;$i<count($temp);$i++)
			{
				$t = $temp[$i];
				$id = $id.$t[0];
			}
			mysqli_query($con,"INSERT INTO institution VALUES ('$Email','$passworde','$phone','$named','$namef','$namem','$namel','$code','$institution_name','$address','$imagetmp','$activation','','')");
			$extract = mysqli_query($con,"SELECT id FROM institution ORDER by id DESC LIMIT 1");
			$row = mysqli_fetch_assoc($extract);
			$cid = $id.$row['id'];
			//institution_check
			$extract_check = mysqli_query($con,"select * from institution where cid like '$id%'");
			$count = mysqli_num_rows($extract_check);
			//institution_check end
			$id=$row['id'];
			if($count==1)
			{
				mysqli_query($con,"DELETE institution WHERE id='$id'");
				$_SESSION['message']="Institution registration already done.";
				header("location: register");
			}
			else
			{
				mysqli_query($con,"UPDATE institution SET cid = '$cid' where id='$id'");
				$subject = "Registration - Smart Career";
				$msg = "Hello ".$namef."\n\nThank you for registering with Smart Career. Click on the below link to activate your account.\n http://35.154.87.54/iactivation?activation=".$activation."&Email=".$Email;
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

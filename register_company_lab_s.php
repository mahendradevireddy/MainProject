<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
	$cstate = $_POST['cstate'];
	$cname = $_POST['cname'];
	$cother = $_POST['cother'];
	$curl = $_POST['curl'];
  $caddress = $_POST['caddress'];
	$cnamef = $_POST['cnamef'];
  $cnamem = $_POST['cnamem'];
	$cnamel = $_POST['cnamel'];
  $cnamed = $_POST['cnamed'];
	$cEmail = $_POST['cEmail'];
	$cphone = $_POST['cphone'];
	$cpassword = $_POST['cpassword'];
	$file_size = $_FILES['file-3']['size'];
	if($file_size > 153600)
	{
		$_SESSION['message'] = "File too large. File must be less than 150 kilobytes.";
		header("location: register");
	}
	else if(getimagesize($_FILES['file-3']['tmp_name']) == FALSE )
	{
		$_SESSION['message'] = "Please select an image.";
		header("location: register");
	}
	else
	{
    if($cname=="other")
      $cname = $cother;
		$passworde = md5($_POST['cpassword']);
		$imagetmp = addslashes (file_get_contents($_FILES['file-3']['tmp_name']));
		$activation = randomactivation();
    mysqli_query($con,"INSERT INTO company_lab VALUES ('','$cstate','$cname','$curl','$caddress','$cnamef','$cnamem','$cnamel','$cnamed','$cEmail','$cphone','$imagetmp','$passworde','$activation')");
    $subject = "Registration - Smart Career";
    $msg = "Hello ".$namef."\n\nThank you for registering with Smart Career. Click on the below link to activate your account.\n http://35.154.87.54/cactivation?activation=".$activation."&Email=".$cEmail;
    $from = "From: saikirannikhil007@gmail.com"."\r\n";
    mail($cEmail,$subject,$msg,$from);
    $_SESSION['message']="Successfully registered. An activation mail has been send to your email id. Click on the activation link given in the mail to activate your account.";
		header("location: register");
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

<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
	$state = $_POST['state'];
	$iname = $_POST['iname'];
	$sname = $_POST['sname'];
	$roll = $_POST['roll'];
	$roll = strtoupper($roll);
	$extract = mysqli_query($con,"SELECT research_scholar.id FROM research_scholar,institution WHERE research_scholar.name='$sname' and research_scholar.roll='$roll' and institution.iname='$iname' and institution.cid=research_scholar.cid");
	$count = "0";
	if($row = mysqli_fetch_array($extract))
	{
		$count = "1";
		$email = $_SESSION['email'];
	 	mysqli_query($con,"UPDATE users SET verification = '1' where email='$email'");
		$extract = mysqli_query($con,"SELECT cid from institution where iname='$iname'");
		$row = mysqli_fetch_array($extract);
		$cid = $row['cid'];
		mysqli_query($con,"INSERT into user_link VALUES ('','$roll','$email','$cid')");
	}
	if($count=="0")
	{
		echo $count;
		$extract = mysqli_query($con,"SELECT * from institution where iname='$iname'");
		$row = mysqli_fetch_array($extract);
		echo "$@!";
		echo $row['email'];
		echo "$@!";
		echo $row ['namef'];
		echo " ";
		echo $row['namem'];
		echo " ";
		echo $row['namel'];
	}
	else
	{
		echo $count;
	}
  mysqli_close($con);
?>

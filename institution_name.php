<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $code = $_POST['code'];
	echo "<option value='Select Institution Name'>Select Institution Name</option>";
  $extract = mysqli_query($con,"select * from state_college where codes='$code'");
  while($row = mysqli_fetch_array($extract))
  {
    $name = $row['name'];
    echo "<option value='$name'>$name</option>";
  }
  mysqli_close($con);
?>

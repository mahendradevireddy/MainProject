<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $name = $_POST['name'];
  $extract = mysqli_query($con,"SELECT research_scholar.name from research_scholar,institution WHERE research_scholar.cid=institution.cid and institution.iname='$name'") or die("<script>console.log('sai');</script>");
	echo "<option value='Select Full Name'>Select Full Name</option>";
  while($row = mysqli_fetch_array($extract))
  {
    $name = $row['name'];
    echo "<option value='$name'>$name</option>";
  }
  mysqli_close($con);
?>

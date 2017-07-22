<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password, $database);
  $year = $_POST['year'];
  $extract1 = mysqli_query($con,"
  SELECT COUNT(id) as val FROM gender_1 WHERE sex='Male' AND YEAR(year) like '$year'
  ");
  $extract2 = mysqli_query($con,"
  SELECT COUNT(id) as val FROM gender_1 WHERE sex='Female' AND YEAR(year) like '$year'
  ");
  $row1 = mysqli_fetch_assoc($extract1);
  $row2 = mysqli_fetch_assoc($extract2);
  $male = $row1['val'];
  $female = $row2['val'];
  echo $male;
  echo $female;
  /*
  echo "[";
    echo '{ "Gender" : "Male" ,   "Number of Male PhD"   : '.$male.'},
          { "Gender" : "Female" , "Number of Female PhD" : '.$female.' }';
  echo "]";*/
  mysqli_close($con);
?>

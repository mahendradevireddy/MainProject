<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $cid = $_SESSION['cid'];
  $lab_name = $_POST['lab_name'];
  $incharge = $_POST['incharge'];
  $area = $_POST['area'];
  $areaall = "";
  $i=0;
  foreach ($area as &$value) {
    $i++;
  }
  foreach ($area as &$value) {
    $i--;
    if($i==0)
      $areaall = $areaall."".$value;
    else
      $areaall = $areaall."".$value.",";
  }
  $extract = mysqli_query($con,"SELECT * FROM research_lab where cid='$cid'");
  mysqli_query($con,"insert into research_lab values('','$cid','','$lab_name','$incharge','$areaall')");
  $count = mysqli_num_rows($extract);
  $count = $count + 1;
  $lid = $cid."L".$count;
  $extract = mysqli_query($con,"SELECT id FROM research_lab where cid='$cid' ORDER by id DESC LIMIT 1");
  $row = mysqli_fetch_assoc($extract);
  $id=$row['id'];
  mysqli_query($con,"UPDATE research_lab SET lid = '$lid' where id='$id'");
  mysqli_close($con);
?>

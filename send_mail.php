<?php
  $servername = "127.0.0.1";
  $username = "root";
  $password = "$@!Sai5171";
  $database = "codejudge";
  $con =  mysqli_connect($servername, $username, $password,$database);
  $from = "From: saikirannikhil007@gmail.com"."\r\n";
  $Email = $_POST['mail'];
  $subject = $_POST['subject'];
  $msg = $_POST['message'];
  mail($Email,$subject,$msg,$from);
  mysqli_close($con);
?>

<?php
	session_start();
  $_SESSION['message'] = "You have been successfully logged out.";
  header("location: home");
?>

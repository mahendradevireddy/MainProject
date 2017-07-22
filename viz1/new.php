<?php
	session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $extract = mysqli_query($con,"SELECT state_codes.name, institution.code, count(research_scholar.id) as count from research_scholar , institution  , state_codes WHERE institution.cid = research_scholar.cid and state_codes.codes = institution.code GROUP by institution.code");
  $count = mysqli_num_rows($extract);
  $fp = fopen('empdata.json', 'w');
  fwrite($fp, "[");
  while($row =mysqli_fetch_assoc($extract))
  {
      $count--;
      if($count!=0)
      {
          fwrite($fp,  "{\"name\":");
          fwrite($fp,  "\"".$row['name']."\",");
          fwrite($fp,  "\"id\":");
          fwrite($fp,  "\"".$row['code']."\",");
          fwrite($fp,  "\"value\":");
          fwrite($fp,  $row['count']);
          fwrite($fp,  "},");
      }
      else
      {
          fwrite($fp,  "{\"name\":");
          fwrite($fp,  "\"".$row['name']."\",");
          fwrite($fp,  "\"id\":");
          fwrite($fp,  "\"".$row['code']."\",");
          fwrite($fp,  "\"value\":");
          fwrite($fp,  $row['count']);
          fwrite($fp,  "}");
      }

  }
  fwrite($fp, "]");
  mysqli_close($con);
?>

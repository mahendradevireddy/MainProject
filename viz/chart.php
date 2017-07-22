<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password, $database);
  $year = $_POST['year'];
  $sex = $_POST['sex'];
  $state = $_POST['state'];
  $area = $_POST['area'];
  $status = $_POST['status'];
  if($state!="%")
  {
    $extract = mysqli_query($con,"
    SELECT COUNT(DISTINCT research_area.id) AS nora,COUNT(DISTINCT users.aadhar) AS number,research_scholar.cid,institution.code,institution.iname
    FROM research_scholar,institution,user_link,users,research_area
    WHERE institution.cid=research_scholar.cid AND user_link.cid = research_scholar.cid AND users.email = user_link.email
    AND institution.code = (SELECT codes from state_codes where name = '$state') AND YEAR(research_scholar.year) like '$year' AND research_scholar.areas like '%$area%' AND research_scholar.status like '$status' AND users.sex like '$sex' AND research_area.cid = research_scholar.cid
    GROUP BY research_scholar.cid
    ");
    $count = mysqli_num_rows($extract);
    echo "[";
    while($row = mysqli_fetch_assoc($extract))
    {
      $count--;
      if($count!=0)
      {
        echo " { \"Number of phd's\" : ".$row['number']." , \"College Id\" : \"".$row['cid']."\" , \"Total Number of research area's\" : ".$row['nora']." , \"codes\" : \"".$row['code']."\" , \"College name\" : \"".$row['iname']."\" }, ";
      }
      else
      {
        echo " { \"Number of phd's\" : ".$row['number']." , \"College Id\" : \"".$row['cid']."\" , \"Total Number of research area's\" : ".$row['nora']." , \"codes\" : \"".$row['code']."\" , \"College name\" : \"".$row['iname']."\" } ";
      }
    }
    echo "]";
  }
  else
  {
    $extract = mysqli_query($con,"
    SELECT COUNT(DISTINCT research_scholar.cid) AS clgno,COUNT(users.aadhar) AS number,state_college.codes,state_codes.name
    FROM research_scholar,institution,state_college,state_codes,user_link,users
    WHERE institution.cid = research_scholar.cid AND state_college.name = institution.iname AND state_codes.codes = state_college.codes AND user_link.roll = research_scholar.roll AND users.email = user_link.email AND users.sex like '$sex' AND state_codes.name like '$state' AND YEAR(research_scholar.year) like '$year' AND research_scholar.areas like '%$area%' AND research_scholar.status like '$status'
    GROUP BY state_codes.codes");
    $count = mysqli_num_rows($extract);
    echo "[";
    while($row = mysqli_fetch_assoc($extract))
    {
      $count--;
      if($count!=0)
      {
        echo " { \"Number of phd's\" : ".$row['number']." , \"Number of colleges\" : ".$row['clgno']." , \"codes\" : \"".$row['codes']."\" , \"state name\" : \"".$row['name']."\" }, ";
      }
      else
      {
        echo " { \"Number of phd's\" : ".$row['number']." , \"Number of colleges\" : ".$row['clgno']." , \"codes\" : \"".$row['codes']."\" , \"state name\" : \"".$row['name']."\" } ";
      }
    }
    echo "]";
  }
	mysqli_close($con);
?>

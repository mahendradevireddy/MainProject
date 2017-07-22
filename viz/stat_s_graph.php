<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password, $database);
  $a = $_POST['a'];
  $b = $_POST['b'];
  if($a==1)
  {
    $extract = mysqli_query($con,"
    SELECT c.codes,c.name,count(b.id) as ct
    FROM institution a, research_scholar b ,state_codes c where a.cid=b.cid and a.code=c.codes group by code order by ct desc limit $b
    ");
    $count = mysqli_num_rows($extract);
    echo "[";
    while($row = mysqli_fetch_assoc($extract))
    {
      $count--;
      if($count!=0)
      {
        echo " { \"State\" : \"".$row['name']."\" , \"No. of Institutions\" : ".$row['ct']." , \"codes\" : \"".$row['codes']."\"}, ";
      }
      else
      {
        echo " { \"State\" : \"".$row['name']."\" , \"No. of Institutions\" : ".$row['ct']." , \"codes\" : \"".$row['codes']."\" } ";
      }
    }
    echo "]";
  }
  else if($a==2)
  {

    $extract = mysqli_query($con,"
    select a.code,iname,count(b.id) as ct from institution a, research_scholar b where a.cid=b.cid group by a.cid order by ct desc limit $b");
    $count = mysqli_num_rows($extract);
    echo "[";
    while($row = mysqli_fetch_assoc($extract))
    {
      $count--;
      if($count!=0)
      {
        echo " { \"Institution\" : \"".$row['iname']."\" , \"No. of Institutions\" : ".$row['ct']." , \"codes\" : \"".$row['code']."\"}, ";
      }
      else
      {
        echo " { \"Institution\" : \"".$row['iname']."\" , \"No. of Institutions\" : ".$row['ct']." , \"codes\" : \"".$row['code']."\" } ";
      }
    }
    echo "]";
  }
  else if($a==3)
  {

    $extract = mysqli_query($con,"
    select areas,count(areas) as ct from research_scholar group by areas order by ct desc limit $b");
    $count = mysqli_num_rows($extract);
    echo "[";
    while($row = mysqli_fetch_assoc($extract))
    {
      $count--;
      if($count!=0)
      {
        echo " { \"Research Area\" : \"".$row['areas']."\" , \"No. of Research Scholars\" : ".$row['ct']." }, ";
      }
      else
      {
        echo " { \"Research Area\" : \"".$row['areas']."\" , \"No. of Research Scholars\" : ".$row['ct']." } ";
      }
    }
    echo "]";
  }
  else if($a==4)
  {
    echo '[';
    $extract = mysqli_query($con,"
    select COUNT(research_scholar.id) as val from research_scholar where YEAR(research_scholar.year) BETWEEN 2016 and 2017");
    $row = mysqli_fetch_assoc($extract);
    $x = $row['val'];
    echo '{"year": "2016-2017", "name":"No. of PhD Registered/Completed", "value": '.$x.'},';
    $extract = mysqli_query($con,"
    select COUNT(research_scholar.id) as val from research_scholar where YEAR(research_scholar.year) BETWEEN 2015 and 2016");
    $row = mysqli_fetch_assoc($extract);
    $x = $row['val'];
    echo '{"year": "2015-2016", "name":"No. of PhD Registered/Completed", "value": '.$x.'},';
    $extract = mysqli_query($con,"
    select COUNT(research_scholar.id) as val from research_scholar where YEAR(research_scholar.year) BETWEEN 2014 and 2015");
    $row = mysqli_fetch_assoc($extract);
    $x = $row['val'];
    echo '{"year": "2014-2015", "name":"No. of PhD Registered/Completed", "value": '.$x.'},';
    $extract = mysqli_query($con,"
    select COUNT(research_scholar.id) as val from research_scholar where YEAR(research_scholar.year) BETWEEN 2013 and 2014");
    $row = mysqli_fetch_assoc($extract);
    $x = $row['val'];
    echo '{"year": "2013-2014", "name":"No. of PhD Registered/Completed", "value": '.$x.'}';
/*
    echo '
     {"year": "2011-2012", "name":"No. of PhD Registered/Completed", "value": 242},
     {"year": "2013-2014", "name":"No. of PhD Registered/Completed", "value": 34},
     {"year": "2014-2015", "name":"No. of PhD Registered/Completed", "value": 118},
     {"year": "2016-2017", "name":"No. of PhD Registered/Completed", "value": 177}
    ]*/
    echo ']';
  }
  mysqli_close($con);
?>

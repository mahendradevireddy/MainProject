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
    SELECT c.name,count(b.id) as ct
    FROM institution a, research_scholar b ,state_codes c where a.cid=b.cid and a.code=c.codes group by code order by ct desc limit $b
    ");
    echo '<ul class="list-group">';
    while($row = mysqli_fetch_assoc($extract))
    {
      echo '
        <li class="list-group-item">
          <span class="badge">'.$row["ct"].'</span>
          '.$row["name"].'
        </li>

      ';
    }
    echo '</ul>';
  }
  else if($a==2)
  {
    $extract = mysqli_query($con,"
    select iname,count(b.id) as ct from institution a, research_scholar b where a.cid=b.cid group by a.cid order by ct desc limit $b
    ");
    echo '<ul class="list-group">';
    while($row = mysqli_fetch_assoc($extract))
    {
      echo '
        <li class="list-group-item">
          <span class="badge">'.$row["ct"].'</span>
          '.$row["iname"].'
        </li>

      ';
    }
    echo '</ul>';
  }
  else if($a==3)
  {
    $extract = mysqli_query($con,"
    select areas,count(areas) as ct from research_scholar group by areas order by ct desc limit $b");
    echo '<ul class="list-group">';
    while($row = mysqli_fetch_assoc($extract))
    {
      echo '
        <li class="list-group-item">
          <span class="badge">'.$row["ct"].'</span>
          '.$row["areas"].'
        </li>

      ';
    }
    echo '</ul>';
  }
  else if($a==4)
  {
    $extract = mysqli_query($con,"
    select COUNT(research_scholar.id)as val from research_scholar where YEAR(research_scholar.year) BETWEEN 2016 and 2017");
    $row = mysqli_fetch_assoc($extract);
    $x = $row['val'];
    echo '<ul class="list-group">';
      echo '
        <li class="list-group-item">
          <span class="badge">'.$x.'</span>
          '.'2016-2017'.'
        </li>
      ';
      $extract = mysqli_query($con,"
      select COUNT(research_scholar.id)as val from research_scholar where YEAR(research_scholar.year) BETWEEN 2015 and 2016");
      $row = mysqli_fetch_assoc($extract);
      $x = $row['val'];
      echo '
        <li class="list-group-item">
          <span class="badge">'.$x.'</span>
          '.'2015-2016'.'
        </li>
      ';
      $extract = mysqli_query($con,"
      select COUNT(research_scholar.id)as val from research_scholar where YEAR(research_scholar.year) BETWEEN 2014 and 2015");
      $row = mysqli_fetch_assoc($extract);
      $x = $row['val'];
      echo '
        <li class="list-group-item">
          <span class="badge">'.$x.'</span>
          '.'2014-2015'.'
        </li>
      ';
      $extract = mysqli_query($con,"
      select COUNT(research_scholar.id)as val from research_scholar where YEAR(research_scholar.year) BETWEEN 2013 and 2014");
      $row = mysqli_fetch_assoc($extract);
      $x = $row['val'];
      echo '
        <li class="list-group-item">
          <span class="badge">'.$x.'</span>
          '.'2013-2014'.'
        </li>
      ';
    echo '</ul>';
  }
  else if($a==5)
  {
    $extract = mysqli_query($con,"
    SELECT * from across_state order by across_state.percentage desc LIMIT $b");
    echo '<ul class="list-group">';
    while($row = mysqli_fetch_assoc($extract))
    {
      echo '
        <li class="list-group-item">
          <span class="badge">'.$row["percentage"].'</span>
          '.$row["state"]."        -        ".$row["itot"]."        -        ".$row["rtot"].'
        </li>

      ';
    }
    echo '</ul>';
  }
  mysqli_close($con);
?>

<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password, $database);
  $x = $_POST['x'];

  echo '<legend>Guide Details</legend>';
  $extract = mysqli_query($con,"
  SELECT research_guide.name,research_guide.designation,research_guide.email,institution.iname
  FROM research_guide,research_area,institution
  WHERE research_guide.specialization = research_area.area AND institution.cid=research_guide.cid AND research_area.area like '$x';
  ");
  echo '<div class="table-responsive">';
  echo '<table class="table table-striped table-hover">';
    echo '<caption>Guide Details</caption>';
    echo '<thead>
          <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Email</th>
            <th>Institution Name</th>
          </tr>
        </thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($extract))
    {

      echo '<tr>
        <td>'.$row['name'].'</td>
        <td>'.$row['designation'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['iname'].'</td>
          </tr>';
    }
    echo '</tbody>';
  echo '</table>';
  echo '</div>';
	mysqli_close($con);
?>

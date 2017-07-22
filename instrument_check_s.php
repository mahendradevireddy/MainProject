<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password, $database);
  $x = $_POST['x'];

  echo '<legend>Instrument Details</legend>';
  $extract = mysqli_query($con,"
  SELECT research_lab_i.instrument_name,institution.iname
FROM research_lab_i,institution
WHERE research_lab_i.cid=institution.cid AND research_lab_i.instrument_name like '$x'");



  echo '<div class="table-responsive">';
  echo '<table class="table table-striped table-hover">';
    echo '<caption>Instrument Details</caption>';
    echo '<thead>
          <tr>
            <th>Instrument Name</th>
            <th>Institution Name</th>
          </tr>
        </thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($extract))
    {

      echo '<tr>
        <td>'.$row['instrument_name'].'</td>
        <td>'.$row['iname'].'</td>
        </tr>';
    }
    echo '</tbody>';
  echo '</table>';
  echo '</div>';
	mysqli_close($con);
?>

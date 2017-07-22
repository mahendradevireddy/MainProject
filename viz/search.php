<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password, $database);
  $x = $_POST['x'];
  $extract = mysqli_query($con,"
  SELECT user_link.email,users.namef,users.namem,users.namel,institution.iname
FROM research_scholar,user_link,users,institution
WHERE research_scholar.roll=user_link.roll AND user_link.email=users.email AND research_scholar.cid=institution.cid AND user_link.email in (
SELECT user_link.email
FROM user_link
WHERE user_link.roll IN (SELECT research_scholar.roll
FROM research_scholar,domain
WHERE domain.area like research_scholar.areas AND domain.keywords like '%$x%'))");
  echo '<div class="table-responsive" style="height: 500px; overflow: auto;">';
  echo '<table class="table table-striped table-hover">';
    echo '<thead>
          <tr>
            <th>Email</th>
            <th>Full Name</th>
            <th>Institution Name</th>
          </tr>
        </thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($extract))
    {
      $email = $row['email'];
      $name = $row['namef']." ".$row['namem']." ".$row['namel'];
      $iname = $row['iname'];
      echo '<tr>
        <td><a target="_blank" onclick="student_det(this.innerHTML);">'.$email.'</a></td>
        <td>'.$name.'</td>
        <td>'.$iname.'</td>
        </tr>';
    }
    echo '</tbody>';
  echo '</table>';
  echo '</div>';
	mysqli_close($con);
?>

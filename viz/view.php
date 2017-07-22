<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password, $database);
  $year = $_POST['year'];
  $sex = $_POST['sex'];
  $area = $_POST['area'];
  $status = $_POST['status'];
  $extract = mysqli_query($con,"
  SELECT users.email,users.namef,users.namem,users.namel,institution.iname
  FROM users,user_link,research_scholar,institution,student_publication
  WHERE users.email=user_link.email AND research_scholar.roll=user_link.roll AND institution.cid=research_scholar.cid AND users.sex like '$sex' AND YEAR(research_scholar.year) like '$year' AND research_scholar.areas like '%$area%' AND research_scholar.status like '$status' AND users.email=student_publication.email ORDER BY student_publication.impact_factor desc
  ");
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

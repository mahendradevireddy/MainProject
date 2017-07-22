<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password, $database);
  $email = $_POST['email'];
  $extract = mysqli_query($con,"
  SELECT research_scholar.status
  FROM research_scholar,users,user_link
  WHERE research_scholar.roll=user_link.roll AND user_link.email=users.email AND  users.email='$email'
  ");
  $row = mysqli_fetch_assoc($extract);
  $status = $row['status'];
  echo '<legend>Scholar Details<span style="float:right;">Status '.$status.'</span></legend>';
  //student_academic
  $extract = mysqli_query($con,"SELECT * FROM student_academic WHERE email='$email'");
  echo '<div class="table-responsive">';
  echo '<table class="table table-striped table-hover">';
    echo '<h3>Student Academic</h3>';
    echo '<thead>
          <tr>
            <th>Degree</th>
            <th>Class</th>
            <th>Year of Completetion</th>
            <th>Specification</th>
            <th>Remarks</th>
          </tr>
        </thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($extract))
    {
      echo '<tr>
        <td>'.$row['degree'].'</td>
        <td>'.$row['class'].'</td>
        <td>'.$row['year'].'</td>
        <td>'.$row['specialisation'].'</td>
        <td>'.$row['remarks'].'</td>
          </tr>';
    }
    echo '</tbody>';
  echo '</table>';
  echo '</div>';
  //student_patent
  $extract = mysqli_query($con,"SELECT * FROM student_patent WHERE email='$email'");
  echo '<div class="table-responsive">';
  echo '<table class="table table-striped table-hover">';
    echo '<h3>Student Patent</h3>';
    echo '<thead>
          <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Inventor</th>
            <th>Patent Number</th>
            <th>Description</th>
          </tr>
        </thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($extract))
    {

      echo '<tr>
        <td>'.$row['title'].'</td>
        <td>'.$row['status'].'</td>
        <td>'.$row['inventor'].'</td>
        <td>'.$row['number'].'</td>
        <td>'.$row['description'].'</td>
        </tr>';
    }
    echo '</tbody>';
  echo '</table>';
  echo '</div>';
  //student_publication
  $extract = mysqli_query($con,"SELECT * FROM student_publication WHERE email='$email'");
  echo '<div class="table-responsive">';
  echo '<table class="table table-striped table-hover">';
    echo '<h3>Student Publication</h3>';
    echo '<thead>
          <tr>
            <th>Title</th>
            <th>Authors</th>
            <th>Name</th>
            <th>Issue</th>
            <th>Volume</th>
            <th>year</th>
            <th>start page</th>
            <th>End page</th>
            <th>Impact Factor</th>
          </tr>
        </thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($extract))
    {

      echo '<tr>
        <td>'.$row['title'].'</td>
        <td>'.$row['authors'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['issue'].'</td>
        <td>'.$row['volume'].'</td>
        <td>'.$row['year'].'</td>
        <td>'.$row['start'].'</td>
        <td>'.$row['end'].'</td>
        <td>'.$row['impact_factor'].'</td>
        </tr>';
    }
    echo '</tbody>';
  echo '</table>';
  echo '</div>';
  //student_thesis
  $extract = mysqli_query($con,"SELECT * FROM student_thesis WHERE email='$email'");
  echo '<div class="table-responsive">';
  echo '<table class="table table-striped table-hover">';
    echo '<h3>Student Thesis</h3>';
    echo '<thead>
          <tr>
            <th>Title</th>
            <th>Abstract</th>
          </tr>
        </thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($extract))
    {

      echo '<tr>
        <td>'.$row['title'].'</td>
        <td>'.$row['abstract'].'</td>
        </tr>';
    }
    echo '</tbody>';
  echo '</table>';
  echo '</div>';
	mysqli_close($con);
?>

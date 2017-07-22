<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript">
			document.addEventListener('contextmenu', event => event.preventDefault());
		</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/navbar-fixed-side.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Student Thesis</title>
    <style>
    .dp {
      background: url(
      <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "$@!Sai5171";
        $database = "hackindia";
        $con =  mysqli_connect($servername, $username, $password,$database);
        $email = $_SESSION['email'];
        $extract= mysqli_query($con,"select image from users where email='$email'");
        $row = mysqli_fetch_assoc($extract);
        echo '"data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
      ?>
      );
      background-position: center;
      background-size: cover;
      border-radius: 25%;
      /*border:1px solid white;*/
      width: 45px;
      height: 45px;
      cursor: pointer;
      margin-top:10px;
      -webkit-transition: -webkit-transform .3s ease-in-out;
      -ms-transition: -ms-transform .3s ease-in-out;
      transition: transform .3s ease-in-out;
    }
    .dp:hover {
      transform:rotate(360deg);
      -ms-transform:rotate(360deg);
      -webkit-transform:rotate(360deg);
    }
    .navbar-brand {
      float: left;
      padding: 5px 0px 7px 3px;
      font-size: 19px;
      line-height: 21px;
      height: 50px;
    }
    li a:hover {
      cursor: pointer;
    }
    </style>
  </head>
  <body>
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-lg-2">
            <nav class="navbar navbar-inverse navbar-fixed-side">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" onclick="myFunction(this)">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                  </button>
                  <a class="navbar-brand" href="#"><h4><b>Smart Career </b><br>Student Profile</span></h4></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                  <ul class="nav navbar-nav">
                    <li><a href="#" class="dropdown-toggle dp" style="margin-left:10px" data-toggle="dropdown" role="button" aria-expanded="false"></a><?php
                      $email = $_SESSION['email'];
                      $extract = mysqli_query($con,"select * from users where email='$email'");
                      $row = mysqli_fetch_assoc($extract);
                      echo "<p style='margin-left:10px;margin-top:10px;margin-bottom:-10px;color:white;'>".$row['namef']."</p>";
                    ?></li>
                    <br>
                    <li><a href="student_personal">Personal Details</a></li>
                    <li><a href="student_academic">Academic Details</a></li>
                    <li><a href="student_patent">Patent Details</a></li>
                    <li><a href="student_publication">Publication Details</a></li>
                    <li><a href="student_thesis">Thesis Details</a></li>
                    <li class="active"><a href="student_jobs">View Vacancy / Jobs</a></li>
                    <li><a href="student_search_guide.php">Search Guide/Equipment</a></li>
                    <!--<li><a href="student_institution.php">View Institution</a></li>-->
                    <li><a href="student_setting">Profile Settings</a></li>
                    <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-sm-9 col-lg-10">
            <!-- your page content -->
            <?php
              if(isset($_SESSION['message']))
              {
                if($_SESSION['message'] == "Thesis details updated successfully.")
                {
                  echo "<script>swal({
                    title: '<span style=\'color:#1E8449;\'>".$_SESSION['message']."<span>',
                    html: true,
                    timer: 1500,
                    showConfirmButton: false
                  });</script>";
                  unset($_SESSION['message']);
                }
              }
            ?>
            <div class="progress progress-striped active" style="margin-top:10px;">
              <?php
                $servername = "127.0.0.1";
                $username = "root";
                $password = "$@!Sai5171";
                $database = "hackindia";
                $con =  mysqli_connect($servername, $username, $password,$database);
                $email = $_SESSION['email'];
                $bar = 0;
                $extract = mysqli_query($con,"select * from student_personal where email='$email'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from student_academic where email='$email'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from student_patent where email='$email'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from student_publication where email='$email'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from student_thesis where email='$email'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $bar = $bar * 20;
                echo "<div class='progress-bar progress-bar-success' style='width:$bar%'></div>";
              ?>
            </div>
            <!-- Thesis Details -->
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Jobs Details</h1>
            <div class="jumbotron">
              <div class="row">
                <div class="col-sm-12 col-sm-offset-0">
                  <?php
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "$@!Sai5171";
                    $database = "hackindia";
                    $con =  mysqli_connect($servername, $username, $password, $database);
                    $extract = mysqli_query($con,"SELECT * FROM post");
                    echo '<div class="table-responsive">';
                    echo '<table class="table table-striped table-hover">';
                      echo '<thead>
                            <tr>
                              <th>Advertisement Details</th>
                              <th>Job decription</th>
                              <th>Date of Announcement</th>
                              <th>Last Date for Sending Applicatio</th>
                              <th>Salary</th>
                              <th>Experience</th>
                              <th>Number of Vacancies</th>
                              <th>Type</th>
                              <th>Job Area</th>
                              <th>Place of Work</th>
                              <th>Vacancy Posted By</th>
                              <th>Company url</th>
                              <th>Web link to advertisement</th>
                            </tr>
                          </thead>';
                      echo '<tbody>';
                      while($row = mysqli_fetch_assoc($extract))
                      {
                        $a = $row['Advertisement'];
                        $b = $row['Job'];
                        $c = $row['Date'];
                        $d = $row['Last'];
                        $e = $row['Salary'];
                        $f = $row['Type'];
                        $g = $row['Experience'];
                        $h = $row['Area'];
                        $i = $row['Place_of_work'];
                        $j = $row['Vacancy_posted'];
                        $k = $row['Web_link'];
                        $l = $row['vacancy'];

                        $extract1 = mysqli_query($con,"SELECT url FROM company_lab WHERE name='$j'");
                        $row1 = mysqli_fetch_assoc($extract1);
                        $ulr = $row1['url'];
                        if($ulr=='')
                          $ulr = "http://www.dbtindia.nic.in/";
                        echo '<tr>
                          <td>'.$a.'</td>
                          <td>'.$b.'</td>
                          <td>'.$c.'</td>
                          <td>'.$d.'</td>
                          <td>'.$e.'</td>
                          <td>'.$f.'</td>
                          <td>'.$l.'</td>
                          <td>'.$g.'</td>
                          <td>'.$h.'</td>
                          <td>'.$i.'</td>
                          <td>'.$j.'</td>
                          <td><a target="_blank" href='.$ulr.'>'.$ulr.'</a></td>
                          <td><a target="_blank" href='.$k.'>'.$k.'</a></td></tr>';
                      }
                      echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                  ?>
                </div>
              </div>
            </div>
            <!-- -->
          </div>
        </div>
      </div>
    </header>
    <section>
    </section>
    <footer>
    </footer>
  </body>
</html>
<script type="text/javascript">
</script>

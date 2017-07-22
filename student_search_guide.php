<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript">
			//document.addEventListener('contextmenu', event => event.preventDefault());
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
    <title>Search</title>
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
    span:hover {
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
                    <li><a href="student_jobs">View Vacancy / Jobs</a></li>
                    <li class="active"><a href="student_search_guide.php">Search Guide/Equipment</a></li>
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
            <!-- earch Research Guide -->
            <div class="panel panel-primary" style="margin-top:15px;">
              <div class="panel-heading" style="height:50px;">
                <h2 style="float:left;margin-top:-5px;">Search Research Guide</h2>
                <span onclick='$("#result1").toggle();' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span>
                <input style="margin-right:50px;margin-left:10px;float:right;" class="btn btn-default btn-sm" type="submit" onClick="search_research();" value="Search"/>
                <select class="form-control input-sm" id="area" name="area" style="float:right;width: 150px;" required>
                  <?php
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "$@!Sai5171";
                    $database = "hackindia";
                    $con =  mysqli_connect($servername, $username, $password,$database);
                    $extract = mysqli_query($con,"select DISTINCT(area) AS area from research_area");
                    echo "<option value='%'>All Area</option>";
                    while($row = mysqli_fetch_array($extract))
                    {
                      $name = $row['area'];
                      echo "<option value='$name'>$name</option>";
                    }
                  ?>
                </select>
                <h3 style="float:right;margin-top:0px;margin-right:15px;">Select Area</h3>
              </div>
              <div class="panel-body">
                <div id="result1">
                </div>
              </div>
            </div>
            <!-- Search Lab Equipment -->
            <div class="panel panel-primary" style="margin-top:15px;">
              <div class="panel-heading" style="height:50px;">
                <h2 style="float:left;margin-top:-5px;">Search Lab Equipment</h2>
                <span onclick='$("#result2").toggle();' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span>
                <input style="margin-right:50px;margin-left:10px;float:right;" class="btn btn-default btn-sm" type="submit" onClick="search_instrument();" value="Search"/>
                <select class="form-control input-sm" id="lab-e" name="lab-e" style="float:right;width: 150px;" required>
                  <?php
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "$@!Sai5171";
                    $database = "hackindia";
                    $con =  mysqli_connect($servername, $username, $password,$database);
                    $extract = mysqli_query($con,"select DISTINCT(instrument_name) AS area from research_lab_i");
                    echo "<option value='%'>All Lab Equipment</option>";
                    while($row = mysqli_fetch_array($extract))
                    {
                      $name = $row['area'];
                      echo "<option value='$name'>$name</option>";
                    }
                  ?>
                </select>
                <h3 style="float:right;margin-top:0px;margin-right:15px;">Select Equipment</h3>
              </div>
              <div class="panel-body">
                <div id="result2">
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
function search_research()
{
  var x = $('#area').val();
  $.ajax({
      type : 'post' ,
      async : false ,
      url : 'viz/student_search_guide_s.php' ,
      data : {x:x} ,
      success:function(output)
      {
        $('#result1').html(output);
      }
  });
}
function search_instrument()
{
  var x = $('#lab-e').val();
  $.ajax({
      type : 'post' ,
      async : false ,
      url : 'instrument_check_s.php' ,
      data : {x:x} ,
      success:function(output)
      {
        $('#result2').html(output);
      }
  });
}
</script>

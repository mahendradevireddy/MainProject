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
    <title>Student Publication</title>
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
                    <li><a href="student_personal">Personal details</a></li>
                    <li><a href="student_academic">Academic details</a></li>
                    <li><a href="student_patent">Patent details</a></li>
                    <li class="active"><a href="student_publication">Publication details</a></li>
                    <li><a href="student_thesis">Thesis details</a></li>
                    <li><a href="student_jobs">View Vacancy / Jobs</a></li>
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
            <!-- Publication Details -->
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Publication Details</h1>
            <div class="jumbotron">
              <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                  <!-- put -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin-top:5px;">Publication Title</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 10px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-bitcoin"></i></div>
                        <input type="text" class="form-control input-sm" id="put" name="put" placeholder="Publication Title" required>
                      </div>
                    </div>
                  </div>
                  <!-- authors -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin-top:5px;">Authors</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 10px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                        <input type="text" class="form-control input-sm" id="authors" name="authors" placeholder="Authors" required>
                      </div>
                    </div>
                  </div>
                  <!-- journal_name -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin-top:5px;">Journal Name</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 10px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-book"></i></div>
                        <input type="text" class="form-control input-sm" id="journal_name" name="journal_name" placeholder="Journal Name" required>
                      </div>
                    </div>
                  </div>
                  <!-- journal_issue -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin-top:5px;">Journal Issue</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 10px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-bookmark"></i></div>
                        <input type="text" class="form-control input-sm" id="journal_issue" name="journal_issue" placeholder="Journal Issue" required>
                      </div>
                    </div>
                  </div>
                  <!-- journal_volume -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin-top:5px;">Journal Volume</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 10px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-inbox"></i></div>
                        <input type="text" class="form-control input-sm" id="journal_volume" name="journal_volume" placeholder="Journal Volume" required>
                      </div>
                    </div>
                  </div>
                  <!-- jyear -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin-top:5px;">Year</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 10px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-calendar"></i></div>
                        <input type="text" class="form-control input-sm" id="jyear" name="jyear" placeholder="Year" required>
                      </div>
                    </div>
                  </div>
                  <!-- spage -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin-top:5px;">Start Page</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 10px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-tag"></i></div>
                        <input type="text" class="form-control input-sm" id="spage" name="spage" placeholder="Start Page" required>
                      </div>
                    </div>
                  </div>
                  <!-- epage -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin-top:5px;">End Page</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 10px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-tags"></i></div>
                        <input type="text" class="form-control input-sm" id="epage" name="epage" placeholder="End Page" required>
                      </div>
                    </div>
                  </div>
                  <!-- impact_factor -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin-top:5px;">Impact Factor</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 10px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-tags"></i></div>
                        <input type="text" class="form-control input-sm" id="ifactor" name="ifactor" placeholder="Impact Factor" required>
                      </div>
                      <input type="button" class="btn btn-success" value="Add" onlick="add();"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- -->
            <ul class="list-group1">
              <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Authors</th>
                    <th>Name</th>
                    <th>Issue</th>
                    <th>Volume</th>
                    <th>Year</th>
                    <th>Start Page</th>
                    <th>End Page</th>
                    <th>Impact Factor</th>
                  </tr>
                </thead>
                <tbody class="table-group1">
                <?php
                  $servername = "127.0.0.1";
                  $username = "root";
                  $password = "$@!Sai5171";
                  $database = "hackindia";
                  $con =  mysqli_connect($servername, $username, $password,$database);
                  $email = $_SESSION['email'];
                  $extract = mysqli_query($con,"select * from student_publication where email='$email'");
                  while($row = mysqli_fetch_array($extract))
                  {
                    $title = $row['title'];
                    $authors = $row['authors'];
                    $name = $row['name'];
                    $issue = $row['issue'];
                    $volume = $row['volume'];
                    $year = $row['year'];
                    $start = $row['start'];
                    $end = $row['end'];
                    $impact = $row['ifactor'];
                    echo '<tr><td>'.$title.'</td><td>'.$authors.'</td><td>'.$name.'</td><td>'.$issue.'</td><td>'.$volume.'</td><td>'.$year.'</td><td>'.$start.'</td><td>'.$end.'</td><td>'.$impact.'</td></tr>';
                  }
                ?>
                </tbody>
              </table>
              </div>
            </ul>
            <input style="margin-top:25px;" class="btn btn-success" id="register_btn" type="submit" onclick="upload();" value="Update"/>
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
  function add()
  {
    var put = $("#put").val();
    var authors = $("#authors").val();
    var journal_name = $("#journal_name").val();
    var journal_issue = $("#journal_issue").val();
    var journal_volume = $("#journal_volume").val();
    var jyear = $("#jyear").val();
    var spage = $("#spage").val();
    var epage = $("#epage").val();
    var ifactor = $("#ifactor").val("");
    if($.trim($("#put").val())!=="" && $.trim($("#authors").val())!=="" && $.trim($("#journal_name").val())!=="" && $.trim($("#journal_issue").val())!=="" && $.trim($("#journal_volume").val())!=="" && $.trim($("#jyear").val())!=="" && $.trim($("#spage").val())!=="" && $.trim($("#epage").val())!=="" && $.trim($("#ifactor").val())!=="")
      $(".table-group1").append('<tr><td>'+put+'</td><td>'+authors+'</td><td>'+journal_name+'</td><td>'+journal_issue+'</td><td>'+journal_volume+'</td><td>'+jyear+'</td><td>'+spage+'</td><td>'+epage+'</td><td>'+ifactor+'</td></tr>');
    $("#put").val("");
    $("#authors").val("");
    $("#journal_name").val("");
    $("#journal_issue").val("");
    $("#journal_volume").val("");
    $("#jyear").val("");
    $("#spage").val("");
    $("#epage").val("");
    $("#ifactor").val("");

  }
  function upload()
  {
    $.ajax({type : 'post' , async : false , url : 'student_publication_s_remove'});
    $('.table-group1').children('tr').each(function(index, element) {
      var student = [];
      $(element).children('td').each(function(index1,element1) {
        student.push($(element1).text());
      });
      $.ajax({type : 'post' , async : false , url : 'student_publication_s' , data : {student:student}});
    });
    // sweetalert
    swal(
      "Good job!",
      "Updated successfully.",
      "success"
    )
  }
</script>

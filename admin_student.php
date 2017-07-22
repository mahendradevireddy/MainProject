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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Retrieve Scholar Details</title>
    <style>
    body {
      background-color: rgb(235, 245, 251);
    }
    .dp {
      background: url(
      <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "$@!Sai5171";
        $database = "hackindia";
        $con =  mysqli_connect($servername, $username, $password,$database);
        $email = $_SESSION['admin'];
        if(isset($_SESSION['company_name']))
        {
          $extract= mysqli_query($con,"select image from company_lab where email='$email'");
        }
        else
        {
          $extract= mysqli_query($con,"select image from admin where email='$email'");
        }
        $row = mysqli_fetch_assoc($extract);
        echo '"data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
      ?>
      );
      background-position: center;
      background-size: cover;
      border-radius: 25%;
      border:1px solid white;
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
    a:hover {
      cursor: pointer;
    }
    </style>
  </head>
  <body>
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-1">
            <nav class="navbar navbar-inverse navbar-fixed-side">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" onclick="myFunction(this)">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                  </button>
                  <a align="center" class="navbar-brand" href="#"><h4><b>Smart Career </b><br>Admin</span></h4></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                  <ul class="nav navbar-nav" style="text-align:center">
                    <li><a href="#" class="dropdown-toggle dp" style="margin:auto;margin-top:15px;" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                    <br>
                    <li><a data-toggle="tooltip1" title="Visualize Data" align="center" href="admin"><i class="fa fa-users fa-2x" aria-hidden="true"></i></a></li>
                    <li class="active"><a data-toggle="tooltip2" title="Retrieve Scholar Details" href="admin_student"><i class="fa fa-id-card-o fa-2x" aria-hidden="true"></i></a></li>
                    <li><a data-toggle="tooltip3" title="Retrieve Thesis" href="admin_crawl"><i class="fa fa-bolt fa-2x" aria-hidden="true"></i></a></li>
                    <li><a data-toggle="tooltip4" title="Post Vacancies" href="admin_post"><i class="fa fa-stack-exchange fa-2x" aria-hidden="true"></i></a></li>
                    <li><a data-toggle="tooltip5" title="Statistics" href="admin_stat.php"><i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i></a></li>
                    <li><a data-toggle="tooltip6" title="Settings" href="admin_setting"><i class="fa fa-cogs fa-2x" aria-hidden="true"></i></a></li>
                    <li><a data-toggle="tooltip7" title="Logout" href="logout"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-lg-11">
            <!-- your page content -->
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Retrieve Scholar Details</h1>
            <?php
            if(isset($_SESSION['message']))
            {
              if( $_SESSION['message'] == "Job/Vacancy posted successfully.")
              {
                echo "<div class='container-fluid'>";
                  echo "<div class='alert alert-success alert-dismissable'>
                    <a class='close' data-dismiss='alert' aria-label='close'>×</a>
                    <strong>".$_SESSION['message']."</strong>
                  </div>";
                echo "</div>";
                unset($_SESSION['message']);
              }
            }
            ?>
            <div class="jumbotron">
              <!-- row 1 -->
              <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                  <div class="container-fluid">
                    <div style="margin:0px 10px 0px 0px;float:left;">
                      <label style="margin:10px 0px 0px 0px;">Year</label>
                      <select class="form-control input-sm" id="year" name="year" style="width: 115px;margin:10px 0px 10px 0px;" autofocus required>
                        <option value='%'>All Year</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                      </select>
                    </div>
                    <div style="margin:0px 10px 0px 0px;float:left;">
                      <label style="margin:10px 0px 0px 0px;">Gender</label>
                      <select class="form-control input-sm" id="sex" name="sex" style="width: 125px;margin:10px 0px 10px 0px;" required>
                        <option value='%'>All Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Transgender">Transgender</option>
                      </select>
                    </div>
                    <div style="margin:0px 10px 0px 0px;float:left;">
                      <label style="margin:10px 0px 0px 0px;">Research Area</label>
                      <select class="form-control input-sm" id="area" name="area" style="width: 175px;margin:10px 0px 10px 0px;" required>
                        <?php
                          $servername = "127.0.0.1";
                          $username = "root";
                          $password = "$@!Sai5171";
                          $database = "hackindia";
                          $con =  mysqli_connect($servername, $username, $password,$database);
                          $extract = mysqli_query($con,"select DISTINCT area from research_area");
                          echo "<option value='%'>All Research Area</option>";
                          while($row = mysqli_fetch_array($extract))
                          {
                            $area = $row['area'];
                            echo "<option value='$area'>$area</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div style="margin:0px 10px 0px 0px;float:left;">
                      <label style="margin:10px 0px 0px 0px;">Status</label>
                      <select class="form-control input-sm" id="status" name="status" style="width: 150px;margin:10px 0px 10px 0px;" required>
                        <option value='%'>All Status</option>
                        <option value='Freshly Registered'>Freshly Registered</option>
                        <option value='On going'>On going</option>
                        <option value='Waiting For viva'>Waiting For viva</option>
                        <option value='Completed'>Completed</option>
                      </select>
                    </div>
                    <div style="margin:0px 10px 0px 0px;float:left;">
                      <input style="width:150px;margin:40px 0px 10px 0px;" class="btn btn-default btn-sm" type="submit" onClick="view();" value="View"/>
                    </div>
                  </div>
                </div>
              </div>
              <!-- row 1 end -->
              <br><br>
              <div class="row">
                <legend style="text-align:center;">OR</legend>
                <div class="col-lg-6 col-lg-offset-3">
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin-top:5px;">Search</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control input-sm" id="key" name="key" placeholder="Search By Keyword" required>
                        <input style="float:left;width:150px;margin:40px 0px 10px 0px;" class="btn btn-default btn-sm" type="submit" onClick="search();" value="Search"/>
                    </div>
                  </div>
                </div>
              </div>
              <br><br><br>
              <!-- row 3 -->
              <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                  <div class="container-fluid" id='retrieve'>
                  </div>
                </div>
              </div>
              <!-- row 3 end-->
              <!-- row 4 -->
              <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                  <div class="container-fluid" id='student_det'>
                  </div>
                </div>
              </div>
              <!-- row 4 end -->
            </div>
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
  $(document).ready(function(){
      $('[data-toggle="tooltip1"]').tooltip();
  });
  $(document).ready(function(){
      $('[data-toggle="tooltip2"]').tooltip();
  });
  $(document).ready(function(){
      $('[data-toggle="tooltip3"]').tooltip();
  });
  $(document).ready(function(){
      $('[data-toggle="tooltip4"]').tooltip();
  });
  $(document).ready(function(){
      $('[data-toggle="tooltip5"]').tooltip();
  });
  $(document).ready(function(){
      $('[data-toggle="tooltip6"]').tooltip();
  });
  $(document).ready(function(){
      $('[data-toggle="tooltip7"]').tooltip();
  });
  if($(document).width()<=750)
    ;
  else
  {
    $(".col-lg-1").css("width","5%");
    $(".col-lg-11").css("width","95%");
  }

  function view()
  {
    var year = $("#year").val();
    var sex = $("#sex").val();
    var area = $("#area").val();
    var status = $("#status").val();
    $.ajax({
      type : 'post' ,
      async : false ,
      url : 'viz/view.php' ,
      data : {year:year,sex:sex,area:area,status:status} ,
      success:function(output) {
        $('#retrieve').html(output);
      }
    });
  }
  function search()
  {
    var x = $("#key").val();
    $.ajax({
      type : 'post' ,
      async : false ,
      url : 'viz/search.php' ,
      data : {x:x} ,
      success:function(output) {
        $('#retrieve').html(output);
      }
    });
  }

  function student_det(email)
  {
    $.ajax({
      type : 'post' ,
      async : false ,
      url : 'viz/student_det.php' ,
      data : {email:email} ,
      success:function(output) {
        $('#student_det').html(output);
      }
    });
  }
</script>

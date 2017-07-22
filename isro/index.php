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
  <link rel="stylesheet" type="text/css" href="css/viz.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/sweetalert.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <link rel="icon" type="image/png" href="images/logo.png">
  <title>Admin</title>
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
  span:hover {
    cursor: pointer;
  }
  a:hover {
    cursor: pointer;
  }
  #viz_under ul li:hover {
    cursor: pointer;
  }
  </style>
</head>
<body onload="visualize();">
  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-1">
          <nav class="navbar navbar-inverse navbar-fixed-side">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" onclick="myFunction(this)">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar bar1"></span>
                  <span class="icon-bar bar2"></span>
                  <span class="icon-bar bar3"></span>
                </button>
                <a align="center" class="navbar-brand" href="#"><h4><b>Project Tracker</b><br>Admin</span></h4></a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav" style="text-align:center">
                  <li><a href="#" class="dropdown-toggle dp" style="margin:auto;margin-top:15px;" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                  <br>
                  <li class="active"><a data-toggle="tooltip1" title="Dashboard" align="center" href="admin"><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i></a></li>
                  <li><a data-toggle="tooltip2" title="View Tasks" href="admin_student"><i class="fa fa-tasks fa-2x" aria-hidden="true"></i></a></li>
                  <li><a data-toggle="tooltip3" title="Set Time" href="admin_crawl"><i class="fa fa-clock-o fa-2x" aria-hidden="true"></i></a></li>
                  <li><a data-toggle="tooltip4" title="Cost Details" href="admin_post"><i class="fa fa-inr fa-2x" aria-hidden="true"></i></a></li>
                  <li><a data-toggle="tooltip6" title="Documents" href="admin_stat.php"><i class="fa fa-files-o fa-2x" aria-hidden="true"></i></a></li>
                  <li><a data-toggle="tooltip5" title="Projects" href="admin_setting"><i class="fa fa-th fa-2x" aria-hidden="true"></i></a></li>
                  <li><a data-toggle="tooltip5" title="View Statistics" href="admin_setting"><i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i></a></li>
                  <li><a data-toggle="tooltip7" title="Logout" href="logout"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
        <div class="col-sm-11">
          <!-- your page content -->

          <!-- end your page content -->
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
  $(".col-sm-1").css("width","5%");
  $(".col-sm-11").css("width","95%");
}
//$("#viz svg").width('100%');
//$("#viz svg").height('100%');
</script>
<script src="//d3plus.org/js/d3.js"></script>
<script src="http://d3js.org/topojson.v1.min.js"></script>
<script src="//d3plus.org/js/d3plus.js"></script>
<script type="text/javascript" src="js/viz.js"></script>

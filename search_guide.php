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
    <title>Search Research Guide</title>
    <style>
    .dp {
      background: url(
      <?php
      $servername = "127.0.0.1";
      $username = "root";
      $password = "$@!Sai5171";
      $database = "hackindia";
      $con =  mysqli_connect($servername, $username, $password,$database);
      $cid = $_SESSION['cid'];
      $extract= mysqli_query($con,"select image from institution where cid='$cid'");
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
                  <a class="navbar-brand" href="#"><h4><b>Smart Career </b><br>institution Profile</span></h4></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                  <ul class="nav navbar-nav">
                    <li><a href="#" class="dropdown-toggle dp" style="margin-left:10px" data-toggle="dropdown" role="button" aria-expanded="false"></a><?php
                      $cid = $_SESSION['cid'];
                      $extract = mysqli_query($con,"select * from institution where cid='$cid'");
                      $row = mysqli_fetch_assoc($extract);
                      echo "<p style='margin-left:10px;margin-top:10px;margin-bottom:-10px;color:white;'>".$row['iname']."</p>";
                    ?></li>
                    <br>
                    <li><a href="research_area">Research Area</a></li>
                    <li><a href="research_guide">Research Guide</a></li>
      							<li><a href="research_lab">Research Lab</a></li>
      							<li><a href="research_scholar">Research Scholar</a></li>
                    <li class="active"><a href="search_guide.php">Search Research Guide</a></li>
                    <li><a href="institution_setting">Settings</a></li>
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
                $cid = $_SESSION['cid'];
                $bar = 0;
                $extract = mysqli_query($con,"select * from research_area where cid='$cid'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from research_guide where cid='$cid'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from research_lab where cid='$cid'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $extract = mysqli_query($con,"select * from research_scholar where cid='$cid'");
                $count = mysqli_num_rows($extract);
                if($count)
                  $bar++;
                $bar = $bar * 25;
                echo "<div class='progress-bar progress-bar-success' style='width:$bar%'></div>";
              ?>
            </div>
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Search Research Guide</h1>
              <div class="jumbotron" style="margin-top:0px;">
                <div class="row">
                  <div clss="col-lg-12">
                    <div style="margin:0px 10px 0px 0px;float:left;">
                      <label style="margin:10px 0px 0px 0px;">Select Area</label>
                      <select class="form-control input-sm" id="area" name="area" style="width: 150px;margin:10px 0px 10px 0px;" required>
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
                    </div>
                    <input style="width:150px;margin:40px 0px 10px 0px;" class="btn btn-default btn-sm" type="submit" onClick="search();" value="Search"/>
                  </div>
                  <div class="col-lg-12">
                    <div id='result'>
                    </div>
                  </div>
                </div>
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
  function search()
  {
    var x = $('#area').val();
    $.ajax({
        type : 'post' ,
        async : false ,
        url : 'viz/search_guide_s.php' ,
        data : {x:x} ,
        success:function(output)
        {
          $('#result').html(output);
        }
    });
  }
</script>

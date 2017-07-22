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
    <title>Research Setting</title>
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
                    <li><a href="search_guide.php">Search Research Guide</a></li>
                    <li class="active"><a href="institution_setting">Settings</a></li>
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
            <?php
            if(isset($_SESSION['message']))
            {
              if( $_SESSION['message'] == "Old Password is wrong." || $_SESSION['message'] == "It's seems your new password matches with the current password!" || $_SESSION['message'] == "File too large. File must be less than 150 kilobytes." || $_SESSION['message'] == "Please select an image.")
              {
                echo "<div class='container-fluid'>";
                  echo "<div class='alert alert-danger alert-dismissable'>
                    <a class='close' data-dismiss='alert' aria-label='close'>×</a>
                    <strong>".$_SESSION['message']."</strong>
                  </div>";
                echo "</div>";
                unset($_SESSION['message']);
              }
              else if( $_SESSION['message'] == "Password updated successfully." || $_SESSION['message'] == "Profile pic successfully updated.")
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
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Settings</h1>
              <div class="jumbotron" style="margin-top:0px;">
                <div class="row">
                  <div clss="col-lg-12">
                    <form action="institution_setting_s" method="post">
                      <!-- opass -->
                      <div class="form-group">
                        <label class="col-lg-3 col-lg-offset-2 control-label" style="margin-top:5px;">Old password</label>
                        <div class="col-lg-5">
                          <div class="input-group" style="padding:0px 0px 10px 0px;">
                            <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                            <input type="password" class="form-control input-sm" id="opass" name="opass" placeholder="Old Password" autofocus required>
                          </div>
                        </div>
                      </div>
                      <!-- npass -->
                      <div class="form-group">
                        <label class="col-lg-3 col-lg-offset-2 control-label" style="margin-top:5px;">New password</label>
                        <div class="col-lg-5">
                          <div class="input-group" style="padding:0px 0px 10px 0px;">
                            <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                            <input minlength="8" maxlength="50" type="password" class="form-control input-sm" id="npass" name="npass" placeholder="New Password" required>
                          </div>
                        </div>
                      </div>
                      <!-- rnpass -->
                      <div class="form-group">
                        <label class="col-lg-3 col-lg-offset-2 control-label" style="margin-top:5px;">Retry new password</label>
                        <div class="col-lg-5">
                          <div class="input-group" style="padding:0px 0px 10px 0px;">
                            <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                            <input minlength="8" maxlength="50" type="password" class="form-control input-sm" id="rnpass" name="rnpass" placeholder="Retry New Password" required>
                          </div>
                          <input style="margin-top:25px;" class="btn btn-success" id="register_btn" name="register_btn" type="submit" value="Update"/>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- dp -->
              <div class="jumbotron">
                <div class="row">
                  <div clss="col-lg-12">
                    <form action="institution_setting_s" enctype="multipart/form-data" method="post">
                      <!-- photo -->
                      <div class="form-group">
                        <label class="col-lg-3 col-lg-offset-2 control-label" style="margin-top:5px;">Change profile pic</label>
                        <div class="col-lg-5">
                          <div class="input-group" style="padding:0px 0px 10px 0px;">
                            <input type="file" name="file-1" id="file-1" required>
                            <label class="btn btn-default btn-sm" id="file-1l" for="file-1" style="margin-top: 3px;"><span style="overflow: hidden;">Choose Image</span></label>
                          </div>
                          <input style="margin-top:25px;" class="btn btn-success" id="register_btn1" name="register_btn1" type="submit" value="Update"/>
                        </div>
                      </div>
                    </form>
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
  $("#file-1").change(function() {
    $("#file-1l").css("border","none");
    $("#file-1l").css("background-color","#3fb618");
    $("#file-1l").css("background-image","url('images/check.svg')");
    $("#file-1l").css("background-repeat","no-repeat");
    $("#file-1l").css("background-position","center");
    $("#file-1l").css("background-size","50px 30px");
  });
  var password = document.getElementById("npass"), passwordr = document.getElementById("rnpass");
  function validatePassword(){
    if(password.value != passwordr.value) {
      passwordr.setCustomValidity("Passwords Don't Match");
    } else {
      passwordr.setCustomValidity('');
    }
  }
  password.onchange = validatePassword;
  passwordr.onkeyup = validatePassword;
</script>

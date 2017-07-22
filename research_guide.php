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
    <title>Research Guide</title>
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
                    <li class="active"><a href="research_guide">Research Guide</a></li>
      							<li><a href="research_lab">Research Lab</a></li>
      							<li><a href="research_scholar">Research Scholar</a></li>
                    <li><a href="search_guide.php">Search Research Guide</a></li>
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
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Research Guides</h1>
              <div class="jumbotron" style="margin-top:0px;">
                <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                    <!-- name -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Name</label>
                      <div class="col-lg-9" id="name">
                        <div style="float:left;clear:left;width: 100%;">
                          <div class="input-group" style="padding:0px 0px 10px 0px;">
                            <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                            <input type="name" class="form-control input-sm" id="namef" name="namef" placeholder="First Name" style="width: 100%;" autofocus required>
                          </div>
                          <div class="input-group" style="padding:0px 0px 10px 0px;">
                            <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                            <input type="name" class="form-control input-sm" id="namem" name="namem" placeholder="Middle Name" style="width: 100%;" required>
                          </div>
                          <div class="input-group" style="padding:0px 0px 10px 0px;">
                            <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                            <input type="name" class="form-control input-sm" id="namel" name="namel" placeholder="Last Name" style="width: 100%;" required>
                          </div>
                          <div class="input-group" style="padding:0px 0px 10px 0px;">
                            <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-bookmark"></i></div>
                            <input type="name" class="form-control input-sm" id="named" name="named" placeholder="Designation" style="width: 50%;" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- email -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Email</label>
                      <div class="col-lg-9">
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-envelope"></i></div>
                          <input type="email" class="form-control input-sm" id="Email" name="Email" placeholder="Email" required>
                        </div>
                      </div>
                    </div>
                    <!-- specialization -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Specialization</label>
                      <div class="col-lg-9">
                        <div class="input-group" style="padding:0px 0px 0px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-education"></i></div>
                          <input type="text" class="form-control input-sm" id="specialization" name="specialization" placeholder="Specialization" required>
                        </div>
                      </div>
                    </div>
                    <input style="margin-top:25px;" class="btn btn-success" id="register_btn" type="submit" onclick="addguide();" value="Add"/><br/><br/><br/>
                  </div>
                  <div class="col-sm-8 col-sm-offset-2">
                    <ul class="list-group1">
                      <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Specialization</th>
                          </tr>
                        </thead>
                        <tbody class="table-group1">
                        <?php
                          $servername = "127.0.0.1";
                          $username = "root";
                          $password = "$@!Sai5171";
                          $database = "hackindia";
                          $con =  mysqli_connect($servername, $username, $password,$database);
                          $cid = $_SESSION['cid'];
                          $extract = mysqli_query($con,"select * from research_guide where cid='$cid'");
                          while($row = mysqli_fetch_array($extract))
                          {
                            $name = $row['name'];
                            $designation = $row['designation'];
                            $email = $row['email'];
                            $specialization = $row['specialization'];
                            echo '<tr><td>'.$name.'</td><td>'.$designation.'</td><td>'.$email.'</td><td>'.$specialization.'</td></tr>';
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
  function addguide()
  {
    var namef = document.getElementById("namef").value;
    var namem = document.getElementById("namem").value;
    var namel = document.getElementById("namel").value;
    var named = document.getElementById("named").value;
    var Email =  document.getElementById("Email").value;
    var specialization = document.getElementById("specialization").value;
    if($.trim(namef)!="" && $.trim(namem)!="" && $.trim(namel)!="" && $.trim(named)!="" && $.trim(Email)!="" && $.trim(specialization)!="")
    {
      $( ".table-group1" ).prepend( '<tr><td>'+namef+' '+namem+' '+namel+'</td><td>'+named+'</td><td>'+Email+'</td><td>'+specialization+'</td></tr>');
      document.getElementById("namef").value="";
      document.getElementById("namem").value="";
      document.getElementById("namel").value="";
      document.getElementById("named").value="";
      document.getElementById("Email").value="";
      document.getElementById("specialization").value="";
    }
  }
  function upload()
  {
    $.ajax({type : 'post' , async : false , url : 'research_guide_removeall_s'});
    var i=0;
    $('.table-group1').children('tr').each(function(index, element) {
      var guide = [];
      i++;
      $(element).children('td').each(function(index1,element1) {
        guide.push($(element1).text());
      });
      guide.push(i);
      $.ajax({type : 'post' , async : false , url : 'research_guide_s' , data : {guide:guide}});
    });
    // sweetalert
    swal(
      "Good job!",
      "Updated successfully.",
      "success"
    )
  }
</script>

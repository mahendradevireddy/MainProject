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
    <link rel="stylesheet" type="text/css" href="css/bootstrap-multiselect.css">
    <link rel="stylesheet" type="text/css" href="css/navbar-fixed-side.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Research Lab</title>
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
      							<li class="active"><a href="research_lab">Research Lab</a></li>
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
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Research Labs</h1>
              <div class="jumbotron" style="margin-top:0px;">
                <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                    <!-- lab_name -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Lab Name</label>
                      <div class="col-lg-9">
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-comment"></i></div>
                          <input type="text" class="form-control input-sm" id="lab_name" name="lab_name" placeholder="Lab Name" autofocus required>
                        </div>
                      </div>
                    </div>
                    <!-- area -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Area</label>
                      <div class="col-lg-9">
                        <div style="float:left;clear:left;width: 100%;">
                          <select class="form-control input-sm" multiple="multiple" id="area" name="area" style="margin-bottom: 10px;" required>
                            <?php
                              $servername = "127.0.0.1";
                            	$username = "root";
                            	$password = "$@!Sai5171";
                            	$database = "hackindia";
                            	$con =  mysqli_connect($servername, $username, $password,$database);
                              $cid = $_SESSION['cid'];
                              $extract = mysqli_query($con,"select * from research_area where cid='$cid'");
                              while($row = mysqli_fetch_array($extract))
                              {
                                $area = $row['area'];
                                echo "<option value='$area'>$area</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- incharge -->
                    <div class="form-group" >
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Incharge</label>
                      <div class="col-lg-9" style="margin-top:10px;">
                        <div style="float:left;clear:left;width: 100%;">
                          <select class="form-control input-sm" id="incharge" name="incharge" style="margin-bottom: 10px;" required>
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
                                echo "<option value='$name'>$name</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <input style="margin-top:25px;" class="btn btn-success" id="register_btn" type="submit" onclick="upload();" value="Update"/>
                  </div>
                </div>
              </div>
              <h1 align="left" style="padding: 10px 0px 0px 0px;">Lab Instruments</h1>
              <div class="jumbotron">
                <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                    <!-- lab_name_i -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Lab Name</label>
                      <div class="col-lg-9" id="name">
                        <div style="float:left;clear:left;width: 100%;">
                          <select class="form-control input-sm" id="lab_name_i" name="lab_name_i" style="margin-bottom: 10px;" autofocus required>
                            <?php
                              $servername = "127.0.0.1";
                              $username = "root";
                              $password = "$@!Sai5171";
                              $database = "hackindia";
                              $con =  mysqli_connect($servername, $username, $password,$database);
                              $cid = $_SESSION['cid'];
                              $extract = mysqli_query($con,"select * from research_lab where cid='$cid'");
                              while($row = mysqli_fetch_array($extract))
                              {
                                $lab_name = $row['lab_name'];
                                echo '<option value='.$lab_name.'>'.$lab_name.'</option>';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- instrument_name -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Instrument Name</label>
                      <div class="col-lg-9">
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-comment"></i></div>
                          <input type="text" class="form-control input-sm" id="instrument_name" name="instrument_name" placeholder="Instrument Name" required>
                        </div>
                      </div>
                    </div>
                    <!-- description -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Description</label>
                      <div class="col-lg-9">
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-list"></i></div>
                          <input type="text" class="form-control input-sm" id="description" name="description" placeholder="Description" required>
                        </div>
                      </div>
                    </div>
                    <!-- year_of_install -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Year of Install</label>
                      <div class="col-lg-9">
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-calendar"></i></div>
                          <input type="date" step="1" class="form-control input-sm" id="year_of_install" name="year_of_install" placeholder="Year of Install" required>
                        </div>
                      </div>
                    </div>
                    <!-- status -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top: 5px;">Status</label>
                      <div class="col-lg-9">
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-wrench"></i></div>
                          <input type="text" class="form-control input-sm" id="status" name="status" placeholder="Status" required>
                        </div>
                      </div>
                    </div>
                    <input style="margin-top:25px;" class="btn btn-success" id="register_btn" type="submit" onclick="upload_i();" value="Update"/>
                  </div>
                </div><br><br><br>
                <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                    <label>Lab Instruments Details</label><br><br>
                    <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Lab Name</th>
                          <th>Instrument Name</th>
                          <th>Description</th>
                          <th>Year of install</th>
                          <th>Status</th>
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
                        $extract = mysqli_query($con,"select * from research_lab_i where cid='$cid'");
                        while($row = mysqli_fetch_array($extract))
                        {
                          $lab_name = $row['lab_name'];
                          $instrument_name = $row['instrument_name'];
                          $description = $row['description'];
                          $year_of_install = $row['year_of_install'];
                          $status = $row['status'];
                          echo '<tr><td>'.$lab_name.'</td><td>'.$instrument_name.'</td><td>'.$description.'</td><td>'.$year_of_install.'</td><td>'.$status.'</td></tr>';
                        }
                      ?>
                      </tbody>
                    </table>
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
  $(document).ready(function()
  {
     $('#area').multiselect({
       numberDisplayed: 2,
       includeSelectAllOption: true,
       enableFiltering:true
     });
  });
  function upload()
  {
    var lab_name = $("#lab_name").val();
    var incharge = $("#incharge").val();
    var area = [];
    area = $("#area").val();
    $.ajax({
      type : 'post' ,
      async : false ,
      url : 'research_lab_s',
      data : { lab_name : lab_name , incharge : incharge , area : area }
    });
    // sweetalert
    swal({
      title: '<span style=\'color:#1E8449;\'>Updated successfully.<span>',
      html: true,
      timer: 1000,
      showConfirmButton: false
    });
  }
  function upload_i()
  {
    var lab_namei = $("#lab_name_i option:selected").text();
    var instrument_name = $("#instrument_name").val();
    var description = $("#description").val();
    var year_of_install = $("#year_of_install").val();
    var status = $("#status").val();
    $("#instrument_name").val("");
    $("#description").val("");
    $("#year_of_install").val("");
    $("#status").val("");
    $.ajax({type : 'post' , async : false , url : 'research_lab_s_i',data:{lab_namei:lab_namei, instrument_name:instrument_name, description:description, year_of_install:year_of_install, status:status}});
    $( ".table-group1" ).prepend( '<tr><td>'+lab_namei+'</td><td>'+instrument_name+'</td><td>'+description+'</td><td>'+year_of_install+'</td><td>'+status+'</td></tr>');
    // sweetalert
    swal(
      "Good job!",
      "Updated successfully.",
      "success"
    )
  }
</script>

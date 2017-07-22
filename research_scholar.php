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
    <title>Research Scholar</title>
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
      							<li class="active"><a href="research_scholar">Research Scholar</a></li>
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
              <?php
              if(isset($_SESSION['message']))
              {
                if($_SESSION['message'] == "Scholar details has been upload successfully.")
                {
                  echo "<script>swal({
                    title: '".$_SESSION['message']."',
                    width: 600,
                    padding: 100,
                    timer: 1500,
                    showConfirmButton: false
                  });</script>";
                  unset($_SESSION['message']);
                }
              }
              ?>
            </div>
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Research Scholar</h1>
              <div class="jumbotron" style="margin-top:0px;">
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                    <!-- year -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top:5px;">Year</label>
                      <div class="col-lg-9">
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-calendar"></i></div>
                          <input type="date" class="form-control input-sm" id="year" name="year" placeholder="Year" autofocus required>
                        </div>
                      </div>
                    </div>
                    <!-- radio -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top:5px;">status</label>
                      <div class="col-lg-9">
                        <div class="input-group" style="padding:0px 0px 0px 0px;">
                          <div class="radio" style="padding:0px 0px 0px 5px;">
                            <label>
                              <input type="radio" name="radio" id="radio" value="Freshly Registered" checked="">Freshly Registered
                            </label>
                          </div>
                          <div class="radio" style="padding:0px 0px 0px 5px;">
                            <label>
                              <input type="radio" name="radio" id="radio" value="On going">On going
                            </label>
                          </div>
                          <div class="radio" style="padding:0px 0px 0px 5px;">
                            <label>
                              <input type="radio" name="radio" id="radio" value="Waiting For viva">Waiting For viva
                            </label>
                          </div>
                          <div class="radio" style="padding:0px 0px 10px 5px;">
                            <label>
                              <input type="radio" name="radio" id="radio" value="Completed">Completed
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- number -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label" style="margin-top:5px;">Number of people</label>
                      <div class="col-lg-9">
                        <div class="input-group">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <input type="number" class="form-control input-sm" id="number" name="number" placeholder="Number of people" required>
                        </div>
                        <input style="margin-top:25px;" class="btn btn-success" id="register_btn" type="submit" onclick="add();" value="Add"/><br><br><br>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!--<div class="table-responsive">-->
                      <table class="table table-striped table-hover">
                        <thead class="table-heading">
                          <tr>
                            <th>S. No.</th>
                            <th>Full Name</th>
                            <th>Research Area</th>
                            <th>Roll Number</th>
                            <th>Guide</th>
                          </tr>
                        </thead>
                        <tbody class="table-group1">
                        </tbody>
                      </table>
                      <!--</div>-->
                      <input style="margin-top:25px;" class="btn btn-success" id="register_btn" type="submit" onclick="update();" value="Update"/>
                    </div>
                  </div>
                </div>
              </div>
              <h3 style="text-align:center;">OR</h3>
              <h1 align="left" style="padding: 10px 0px 0px 0px;">Upload Details From Excel</h1>
              <div class="jumbotron">
                <div class="row">
                  <div class="col-sm-12">
                    <h4>Sample csv file <a href="http://35.154.87.54/Smart_Career.csv" download="Smart_Career.csv">Download</a></h4>
                    <p><br><b>Instructions :-</b><br>
                      <ol>
                        <li> Download the sample csv file.</li>
                        <li> Add the details of PH.D. candidates.</li>
                        <li> For the fields research areas, research guides if there are more than one selections seperate them by commas ( , ) .</li>
                      </ul>
                    </p>
                      <form action="research_scholar_s_excel" id="form_basic" class="form-horizontal" enctype="multipart/form-data" method="POST">
                        <input type="file" accept=".csv" name="file-1" id="file-1" required>
                        <label class="btn btn-default btn-sm" id="file-1l" for="file-1" style="margin-top: 3px;"><span style="overflow: hidden;">Choose Excel File</span></label><br><br>
                        <input class="btn btn-success" id="register_btn_excel" type="submit"  value="Upload" disabled>
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
    $("#file-1l").css("background-size","50px 30px");
    $('#register_btn_excel').removeAttr('disabled');
  });
  function add()
  {
    var count = $("#number").val();
    $("#number").val("");
    for( i=1;i<=count;i++)
    {
      $( ".table-group1" ).append( '<tr><td>'+i+'</td><td><input type="text" class="form-control input-sm fname" placeholder="Full Name"></td><td>'+"<?php
        echo "<select class='form-control input-sm area areas' id='area' name='area'>";
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
        echo "</select>";
      ?>"+'</td><td><input type="text" class="form-control input-sm roll" placeholder="Roll Number"></td><td>'+"<?php
        echo "<select class='form-control input-sm name guide' id='name' name='name'>";
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
        echo "</select>";
      ?>"+'</td></tr>');
    }
    $(document).ready(function()
    {
       $('.area').multiselect({
         numberDisplayed: 1,
         includeSelectAllOption: true,
         enableFiltering:true
       });
       $('.name').multiselect({
         numberDisplayed: 1,
         includeSelectAllOption: true,
         enableFiltering:true
       });
    });
  }
  function update()
  {
    $('.table-group1').children('tr').each(function(index, element) {
      var name = $(element).children('td:nth-child(2)').find(".fname").val();
      var area = $(element).children('td:nth-child(3)').find(".areas").val();
      var roll = $(element).children('td:nth-child(4)').find(".roll").val();
      var guide = $(element).children('td:nth-child(5)').find(".guide").val();
      var year = $('#year').val();
      var status = $('input[name=radio]:checked').val();
      $.ajax({type : 'post' , async : false , url : 'research_scholar_s' , data : { name:name, area:area, roll:roll, guide:guide , year:year , status:status }});
    });
    // sweetalert
    swal(
      "Good job!",
      "Updated successfully.",
      "success"
    )
  }
</script>

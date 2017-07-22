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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Admin Statistics</title>
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
                    <li><a data-toggle="tooltip2" title="Retrieve Scholoar Details" href="admin_student"><i class="fa fa-id-card-o fa-2x" aria-hidden="true"></i></a></li>
                    <li><a data-toggle="tooltip3" title="Retrieve Thesis" href="admin_crawl"><i class="fa fa-bolt fa-2x" aria-hidden="true"></i></a></li>
                    <li><a data-toggle="tooltip4" title="Post Vacancies" href="admin_post"><i class="fa fa-stack-exchange fa-2x" aria-hidden="true"></i></a></li>
                    <li class="active"><a data-toggle="tooltip5" title="Statistics" href="admin_stat.php"><i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i></a></li>
                    <li><a data-toggle="tooltip6" title="Settings" href="admin_setting"><i class="fa fa-cogs fa-2x" aria-hidden="true"></i></a></li>
                    <li><a data-toggle="tooltip7" title="Logout" href="logout"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-lg-11">
            <!-- your page content -->
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Statistics</h1>
            <div class="jumbotron">
              <div class="row">
                <div clss="col-sm-12">
                  <!-- -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin -top:10px;">Select Any One</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                        <select style="width:50%;" class="form-control input-sm" id="stat" name="stat" autofocus required>
                          <option value="1">Select TOP 'N' states with Institutions offering PhD in Bio-Technology</option>
                          <option value="2">Select TOP 'N' Institues producing PhD scholars in Bio-Technology</option>
                          <option value="3">TOP 'N' Research Areas</option>
                          <option value="4">Trend Analaysis Year wise</option>
                          <option value="5">Productivity across State</option>
                        </select>
                      </div>
                    </div>
                  </div><br><br>
                  <!-- -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label" style="margin -top:10px;">Count (N)</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                        <input type="number" style="width:20%;" class="form-control input-sm" id="num" name="num" value="5" required>
                      </div>
                    </div>
                  </div>
                  <!-- -->
                  <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                      <input style="margin-top:25px;" class="btn btn-success" type="submit" name="register_btn" id="register_btn" onclick="sat();" value="Submit"/>
                    </div>
                  </div>
                </div>
              </div>
              <br><br>
              <div class="row">
                <div class="col-sm-6" id="left">
                </div>
                <div class="col-sm-6" id="right" style="height:300px;">
                </div>
              </div>
              <div class="err">
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
  function sat()
  {
    var a = $("#stat").val();
    var b = $("#num").val();
    $.ajax({
      type : 'post' ,
      async : false ,
      url : 'viz/stat_s.php' ,
      data : {a:a,b:b} ,
      success:function(output) {
        $("#left").html(output);
      }
    });
    $("#right").html("");
    if(a==1)
    {
      $.ajax({
        type : 'post' ,
        async : false ,
        url : 'viz/stat_s_graph.php' ,
        data : {a:a,b:b} ,
        success:function(output) {
          data = JSON.parse(output);
          d3plus.viz()
          .container("#right")
          .data(data)
          .type("bar")
          .id("codes")
          .x("State")
          .y("No. of Institutions")
          .font({ "family": "Times" })
          .legend({"size": 50})
          .tooltip(["codes"])
          .color(function(d)
          {
            return Math.random();
          })
          .draw()
        }
      });
    }
    else if(a==2)
    {
      $.ajax({
        type : 'post' ,
        async : false ,
        url : 'viz/stat_s_graph.php' ,
        data : {a:a,b:b} ,
        success:function(output) {
          data = JSON.parse(output);
          d3plus.viz()
          .container("#right")
          .data(data)
          .type("bar")
          .id("codes")
          .x("Institution")
          .y("No. of Institutions")
          .font({ "family": "Times" })
          .legend({"size": 50})
          .tooltip(["codes"])
          .color(function(d)
          {
            return Math.random();
          })
          .draw()
        }
      });
    }
    else if(a==3)
    {
      $.ajax({
        type : 'post' ,
        async : false ,
        url : 'viz/stat_s_graph.php' ,
        data : {a:a,b:b} ,
        success:function(output) {
          data = JSON.parse(output);
          d3plus.viz()
          .container("#right")
          .data(data)
          .type("bar")
          .id("Research Area")
          .x("Research Area")
          .y("No. of Research Scholars")
          .font({ "family": "Times" })
          .legend({"size": 75})
          .tooltip(["codes"])
          .color(function(d)
          {
            return Math.random();
          })
          .draw()
        }
      });
    }
    else if(a==4)
    {
      $.ajax({
        type : 'post' ,
        async : false ,
        url : 'viz/stat_s_graph.php' ,
        data : {a:a,b:b} ,
        success:function(output) {
          console.log(output);
          data = JSON.parse(output);
          console.log(data);
          d3plus.viz()
          .container("#right")
          .data(data)
          .type("line")
          .id("name")
          .x("year")
          .y("value")
          .font({ "family": "Times" })
          .legend({"size": 75})
          .tooltip(["codes"])
          .shape({
            "interpolate": "basis"  // takes accepted values to change interpolation type
          })
          .color(function(d)
          {
            return Math.random();
          })
          .draw()
        }
      });
    }
    else if(a==5)
    {
      /*
      $.ajax({
        type : 'post' ,
        async : false ,
        url : 'viz/stat_s_graph.php' ,
        data : {a:a,b:b} ,
        success:function(output) {
          console.log(output);
          data = JSON.parse(output);
          console.log(data);
          d3plus.viz()
          .container("#right")
          .data(data)
          .type("line")
          .id("name")
          .x("year")
          .y("value")
          .font({ "family": "Times" })
          .legend({"size": 75})
          .tooltip(["codes"])
          .shape({
            "interpolate": "basis"  // takes accepted values to change interpolation type
          })
          .color(function(d)
          {
            return Math.random();
          })
          .draw()
        }
      });*/
    }
  }
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
</script>
<script src="//d3plus.org/js/d3.js"></script>
<script src="http://d3js.org/topojson.v1.min.js"></script>
<script src="//d3plus.org/js/d3plus.js"></script>

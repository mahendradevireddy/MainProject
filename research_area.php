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
    <title>Research Area</title>
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
                    <li class="active"><a href="research_area">Research Area</a></li>
                    <li><a href="research_guide">Research Guide</a></li>
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
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Research Domain and corresponding Specialized Research Areas</h1>
            <div style="margin-bottom:10px;" class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							<div class="modal-dialog" style="height:80vh;width:50vw;">
								<div class="modal-content">
									<div class="modal-header" align="center">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<h3 class="modal-title1"></h3>
									</div>
									<br><div class="modal-body1" style="margin:auto;width:45vw;">
									</div><br>
								</div>
							</div>
						</div>
            <div class="row">
            <!-- 1 -->
            <div class="col-sm-5">
              <div class="panel panel-primary" style="margin-top:15px;">
                <div class="panel-heading">
                  <h3 class="panel-title">Applied Microbiology and Microbial Biotechnology<span onclick='$(".modal-body1").html($("#result1").html());$("#Modal1").modal("show");' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span></h3>
                </div>
                <div class="panel-body">
                  <div id="result1">
                    <div class="list-group">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select * from domain where domain='Applied Microbiology and Microbial Biotechnology'");
                        while($row = mysqli_fetch_assoc($extract))
                        {
                          echo '<p class="list-group-item">'.$row['area'].'</p>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <!-- 2 -->
              <div class="col-sm-offset-2 col-sm-5">
              <div class="panel panel-primary" style="margin-top:15px;">
                <div class="panel-heading">
                  <h3 class="panel-title">Agricultural  Biotechnology<span onclick='$(".modal-body1").html($("#result2").html());$("#Modal1").modal("show");' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span></h3>
                </div>
                <div class="panel-body">
                  <div id="result2">
                    <div class="list-group">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select * from domain where domain='Agricultural  Biotechnology'");
                        while($row = mysqli_fetch_assoc($extract))
                        {
                          echo '<p class="list-group-item">'.$row['area'].'</p>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <br><br><br><br>
              <!-- 3 -->
              <div class="col-sm-5">
              <div class="panel panel-primary" style="margin-top:15px;">
                <div class="panel-heading">
                  <h3 class="panel-title">Animal Biotechnology -  Reproductive Technology<span onclick='$(".modal-body1").html($("#result3").html());$("#Modal1").modal("show");' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span></h3>
                </div>
                <div class="panel-body">
                  <div id="result3">
                    <div class="list-group">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select * from domain where domain='Animal Biotechnology -  Reproductive Technology'");
                        while($row = mysqli_fetch_assoc($extract))
                        {
                          echo '<p class="list-group-item">'.$row['area'].'</p>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <!-- 4 -->
              <div class="col-sm-offset-2 col-sm-5">
              <div class="panel panel-primary" style="margin-top:15px;">
                <div class="panel-heading">
                  <h3 class="panel-title">Medical Biotechnology<span onclick='$(".modal-body1").html($("#result4").html());$("#Modal1").modal("show");' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span></h3>
                </div>
                <div class="panel-body">
                  <div id="result4">
                    <div class="list-group">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select * from domain where domain='Medical Biotechnology'");
                        while($row = mysqli_fetch_assoc($extract))
                        {
                          echo '<p class="list-group-item">'.$row['area'].'</p>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <br><br><br><br>
              <!-- 5 -->
              <div class="col-sm-5">
              <div class="panel panel-primary" style="margin-top:15px;">
                <div class="panel-heading">
                  <h3 class="panel-title">Industrial Biotechnology<span onclick='$(".modal-body1").html($("#result5").html());$("#Modal1").modal("show");' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span></h3>
                </div>
                <div class="panel-body">
                  <div id="result5">
                    <div class="list-group">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select * from domain where domain='Industrial Biotechnology'");
                        while($row = mysqli_fetch_assoc($extract))
                        {
                          echo '<p class="list-group-item">'.$row['area'].'</p>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <!-- 6 -->
              <div class="col-sm-offset-2 col-sm-5">
              <div class="panel panel-primary" style="margin-top:15px;">
                <div class="panel-heading">
                  <h3 class="panel-title">Genomics<span onclick='$(".modal-body1").html($("#result6").html());$("#Modal1").modal("show");' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span></h3>
                </div>
                <div class="panel-body">
                  <div id="result6">
                    <div class="list-group">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select * from domain where domain='Genomics'");
                        while($row = mysqli_fetch_assoc($extract))
                        {
                          echo '<p class="list-group-item">'.$row['area'].'</p>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <br><br><br><br>
              <!-- 7 -->
              <div class="col-sm-5">
              <div class="panel panel-primary" style="margin-top:15px;">
                <div class="panel-heading">
                  <h3 class="panel-title">Nano Biotechnology<span onclick='$(".modal-body1").html($("#result7").html());$("#Modal1").modal("show");' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span></h3>
                </div>
                <div class="panel-body">
                  <div id="result7">
                    <div class="list-group">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select * from domain where domain='Nano Biotechnology'");
                        while($row = mysqli_fetch_assoc($extract))
                        {
                          echo '<p class="list-group-item">'.$row['area'].'</p>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <!-- 8 -->
              <div class="col-sm-offset-2 col-sm-5">
              <div class="panel panel-primary" style="margin-top:15px;">
                <div class="panel-heading">
                  <h3 class="panel-title">Molecular Engineering<span onclick='$(".modal-body1").html($("#result8").html());$("#Modal1").modal("show");' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span></h3>
                </div>
                <div class="panel-body">
                  <div id="result8">
                    <div class="list-group">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select * from domain where domain='Molecular Engineering'");
                        while($row = mysqli_fetch_assoc($extract))
                        {
                          echo '<p class="list-group-item">'.$row['area'].'</p>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <br><br><br><br>
              <!-- 9 -->
              <div class="col-sm-5">
              <div class="panel panel-primary" style="margin-top:15px;">
                <div class="panel-heading">
                  <h3 class="panel-title">Biomaterials<span onclick='$(".modal-body1").html($("#result9").html());$("#Modal1").modal("show");' style='float:right;margin-top:5px;margin-left:25px;' class='glyphicon glyphicon-triangle-bottom'></span></h3>
                </div>
                <div class="panel-body">
                  <div id="result9">
                    <div class="list-group">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $extract = mysqli_query($con,"select * from domain where domain='Biomaterials'");
                        while($row = mysqli_fetch_assoc($extract))
                        {
                          echo '<p class="list-group-item">'.$row['area'].'</p>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <h1 align="left" style="padding: 10px 0px 0px 0px;">Research Areas</h1>
              <div class="jumbotron" style="margin-top:0px;">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="checkbox">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $cid = $_SESSION['cid'];

                        $area = "Metagenomics";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Metagenomics' unchecked>Metagenomics&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Metagenomics' checked>Metagenomics&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Applications of AFM";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Applications of AFM' unchecked>Applications of AFM&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Applications of AFM' checked>Applications of AFM&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Synthetic biology";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Synthetic biology' unchecked>Synthetic biology&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Synthetic biology' checked>Synthetic biology&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Pharmacogenomics ";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Pharmacogenomics ' unchecked>Pharmacogenomics &nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Pharmacogenomics ' checked>Pharmacogenomics &nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Antimicrobials";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Antimicrobials' unchecked>Antimicrobials&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Antimicrobials' checked>Antimicrobials&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Transcriptomics";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Transcriptomics' unchecked>Transcriptomics&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Transcriptomics' checked>Transcriptomics&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Artificial Insemination (AI)";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Artificial Insemination (AI)' unchecked>Artificial Insemination (AI)&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Artificial Insemination (AI)' checked>Artificial Insemination (AI)&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Bioenergy and Green Technology";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Bioenergy and Green Technology' unchecked>Bioenergy and Green Technology&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Bioenergy and Green Technology' checked>Bioenergy and Green Technology&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Biomedical materials";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Biomedical materials' unchecked>Biomedical materials&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Biomedical materials' checked>Biomedical materials&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Forest Microbiology";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Forest Microbiology' unchecked>Forest Microbiology&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Forest Microbiology' checked>Forest Microbiology&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Environmental Biotechnology";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Environmental Biotechnology' unchecked>Environmental Biotechnology&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Environmental Biotechnology' checked>Environmental Biotechnology&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Marine Microbiology";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Marine Microbiology' unchecked>Marine Microbiology&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Marine Microbiology' checked>Marine Microbiology&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Genetic Engineering";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Genetic Engineering' unchecked>Genetic Engineering&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Genetic Engineering' checked>Genetic Engineering&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Tissue Culture and Drug Discovery";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Tissue Culture and Drug Discovery' unchecked>Tissue Culture and Drug Discovery&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Tissue Culture and Drug Discovery' checked>Tissue Culture and Drug Discovery&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "DNA Cloning";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='DNA Cloning' unchecked>DNA Cloning&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='DNA Cloning' checked>DNA Cloning&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Bioinspired materials";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Bioinspired materials' unchecked>Bioinspired materials&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Bioinspired materials' checked>Bioinspired materials&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Therapeutic Cloning";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Therapeutic Cloning' unchecked>Therapeutic Cloning&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Therapeutic Cloning' checked>Therapeutic Cloning&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Personalized medicine";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Personalized medicine' unchecked>Personalized medicine&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Personalized medicine' checked>Personalized medicine&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Metabolism and Gene Expression ";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Metabolism and Gene Expression ' unchecked>Metabolism and Gene Expression &nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Metabolism and Gene Expression ' checked>Metabolism and Gene Expression &nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Conservation genomics";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Conservation genomics' unchecked>Conservation genomics&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Conservation genomics' checked>Conservation genomics&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Nanostructures";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Nanostructures' unchecked>Nanostructures&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Nanostructures' checked>Nanostructures&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Soil Microbiology";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Soil Microbiology' unchecked>Soil Microbiology&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Soil Microbiology' checked>Soil Microbiology&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Stem Cell Technology";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Stem Cell Technology' unchecked>Stem Cell Technology&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Stem Cell Technology' checked>Stem Cell Technology&nbsp;&nbsp;&nbsp;</label><br>";


                          $area = "Nanopores";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Nanopores' unchecked>Nanopores&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Nanopores' checked>Nanopores&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Biotechnologically Relevant Enzymes and Proteins ";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Biotechnologically Relevant Enzymes and Proteins ' unchecked>Biotechnologically Relevant Enzymes and Proteins &nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Biotechnologically Relevant Enzymes and Proteins ' checked>Biotechnologically Relevant Enzymes and Proteins &nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Bioremediation";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Bioremediation' unchecked>Bioremediation&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Bioremediation' checked>Bioremediation&nbsp;&nbsp;&nbsp;</label><br>";


                      ?>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="checkbox">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $cid = $_SESSION['cid'];
                        $area = "Metabolic engineering";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Metabolic engineering' unchecked>Metabolic engineering&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Metabolic engineering' checked>Metabolic engineering&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Pharmaceutical Microbiology ";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Pharmaceutical Microbiology ' unchecked>Pharmaceutical Microbiology &nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Pharmaceutical Microbiology ' checked>Pharmaceutical Microbiology &nbsp;&nbsp;&nbsp;</label><br>";


                          $area = "Biopharmaceutical";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Biopharmaceutical' unchecked>Biopharmaceutical&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Biopharmaceutical' checked>Biopharmaceutical&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Embryo Cloning";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Embryo Cloning' unchecked>Embryo Cloning&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Embryo Cloning' checked>Embryo Cloning&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Genetic testing";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Genetic testing' unchecked>Genetic testing&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Genetic testing' checked>Genetic testing&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Genome evolution";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Genome evolution' unchecked>Genome evolution&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Genome evolution' checked>Genome evolution&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Epigenomics";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Epigenomics' unchecked>Epigenomics&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Epigenomics' checked>Epigenomics&nbsp;&nbsp;&nbsp;</label><br>";


                          $area = "Molecular Diagnostic and Prophylactics";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Molecular Diagnostic and Prophylactics' unchecked>Molecular Diagnostic and Prophylactics&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Molecular Diagnostic and Prophylactics' checked>Molecular Diagnostic and Prophylactics&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "In Vitro Fertilization";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='In Vitro Fertilization' unchecked>In Vitro Fertilization&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='In Vitro Fertilization' checked>In Vitro Fertilization&nbsp;&nbsp;&nbsp;</label><br>";


                          $area = "Industrial Microbiology ";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Industrial Microbiology ' unchecked>Industrial Microbiology &nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Industrial Microbiology ' checked>Industrial Microbiology &nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Bioremediation ";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Bioremediation ' unchecked>Bioremediation &nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Bioremediation ' checked>Bioremediation &nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Microengraving";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Microengraving' unchecked>Microengraving&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Microengraving' checked>Microengraving&nbsp;&nbsp;&nbsp;</label><br>";


                          $area = "Food Microbiology ";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Food Microbiology ' unchecked>Food Microbiology &nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Food Microbiology ' checked>Food Microbiology &nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Biomaterials – cells";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Biomaterials – cells' unchecked>Biomaterials – cells&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Biomaterials – cells' checked>Biomaterials – cells&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Nanoparticles";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Nanoparticles' unchecked>Nanoparticles&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Nanoparticles' checked>Nanoparticles&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "BioInformatics";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='BioInformatics' unchecked>BioInformatics&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='BioInformatics' checked>BioInformatics&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Biosensors";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Biosensors' unchecked>Biosensors&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Biosensors' checked>Biosensors&nbsp;&nbsp;&nbsp;</label><br>";


                          $area = "Medical genomics";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Medical genomics' unchecked>Medical genomics&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Medical genomics' checked>Medical genomics&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Nutrigenomics";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Nutrigenomics' unchecked>Nutrigenomics&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Nutrigenomics' checked>Nutrigenomics&nbsp;&nbsp;&nbsp;</label><br>";


                          $area = "Microbial Physiology";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Microbial Physiology' unchecked>Microbial Physiology&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Microbial Physiology' checked>Microbial Physiology&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Biofuels";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Biofuels' unchecked>Biofuels&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Biofuels' checked>Biofuels&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Comparative genomics";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Comparative genomics' unchecked>Comparative genomics&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Comparative genomics' checked>Comparative genomics&nbsp;&nbsp;&nbsp;</label><br>";


                          $area = "Soft lithography";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Soft lithography' unchecked>Soft lithography&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Soft lithography' checked>Soft lithography&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Microfluidics";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Microfluidics' unchecked>Microfluidics&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Microfluidics' checked>Microfluidics&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Protein design";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Protein design' unchecked>Protein design&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Protein design' checked>Protein design&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Food Process Technology";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Food Process Technology' unchecked>Food Process Technology&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Food Process Technology' checked>Food Process Technology&nbsp;&nbsp;&nbsp;</label><br>";

                      ?>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="checkbox">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $cid = $_SESSION['cid'];
                        $area = "Bionanoelectronics";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Bionanoelectronics' unchecked>Bionanoelectronics&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Bionanoelectronics' checked>Bionanoelectronics&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Microscopy - Analytical and Imaging Techniques";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Microscopy - Analytical and Imaging Techniques' unchecked>Microscopy - Analytical and Imaging Techniques&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Microscopy - Analytical and Imaging Techniques' checked>Microscopy - Analytical and Imaging Techniques&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "BioMaterials";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='BioMaterials' unchecked>BioMaterials&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='BioMaterials' checked>BioMaterials&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Genome assembly algorithms";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Genome assembly algorithms' unchecked>Genome assembly algorithms&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Genome assembly algorithms' checked>Genome assembly algorithms&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Aquatic Microbiology";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Aquatic Microbiology' unchecked>Aquatic Microbiology&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Aquatic Microbiology' checked>Aquatic Microbiology&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Nanofabrication and nanopatterning";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Nanofabrication and nanopatterning' unchecked>Nanofabrication and nanopatterning&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Nanofabrication and nanopatterning' checked>Nanofabrication and nanopatterning&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Embryo Transfer";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Embryo Transfer' unchecked>Embryo Transfer&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Embryo Transfer' checked>Embryo Transfer&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Mobile elements";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Mobile elements' unchecked>Mobile elements&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Mobile elements' checked>Mobile elements&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Adult DNA Cloning";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Adult DNA Cloning' unchecked>Adult DNA Cloning&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Adult DNA Cloning' checked>Adult DNA Cloning&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Chemical Biology";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Chemical Biology' unchecked>Chemical Biology&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Chemical Biology' checked>Chemical Biology&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Biomaterials – vaccines";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Biomaterials – vaccines' unchecked>Biomaterials – vaccines&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Biomaterials – vaccines' checked>Biomaterials – vaccines&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Metobolic Engineering and BioProcess Engineering";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Metobolic Engineering and BioProcess Engineering' unchecked>Metobolic Engineering and BioProcess Engineering&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Metobolic Engineering and BioProcess Engineering' checked>Metobolic Engineering and BioProcess Engineering&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Biomaterials – proteins";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Biomaterials – proteins' unchecked>Biomaterials – proteins&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Biomaterials – proteins' checked>Biomaterials – proteins&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Agriculture Microbiology";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Agriculture Microbiology' unchecked>Agriculture Microbiology&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Agriculture Microbiology' checked>Agriculture Microbiology&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Gene therapy";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Gene therapy' unchecked>Gene therapy&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Gene therapy' checked>Gene therapy&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Biosurfactants: Purification, Mass Production, Applications ";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Biosurfactants: Purification, Mass Production, Applications ' unchecked>Biosurfactants: Purification, Mass Production, Applications &nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Biosurfactants: Purification, Mass Production, Applications ' checked>Biosurfactants: Purification, Mass Production, Applications &nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Geomicrobiology";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Geomicrobiology' unchecked>Geomicrobiology&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Geomicrobiology' checked>Geomicrobiology&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Genomics and Molecular breeding";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Genomics and Molecular breeding' unchecked>Genomics and Molecular breeding&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Genomics and Molecular breeding' checked>Genomics and Molecular breeding&nbsp;&nbsp;&nbsp;</label><br>";

                        $area = "Phylogenomics";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Phylogenomics' unchecked>Phylogenomics&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Phylogenomics' checked>Phylogenomics&nbsp;&nbsp;&nbsp;</label><br>";


                        $area = "Microbial Production of Chemicals and Pharmaceuticals";
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                        $count = mysqli_num_rows($extract);
                        if($count == 0)
                          echo "<label><input type='checkbox' value='Microbial Production of Chemicals and Pharmaceuticals' unchecked>Microbial Production of Chemicals and Pharmaceuticals&nbsp;&nbsp;&nbsp;</label><br>";
                        else
                          echo "<label><input type='checkbox' value='Microbial Production of Chemicals and Pharmaceuticals' checked>Microbial Production of Chemicals and Pharmaceuticals&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Pharmacogenomics";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Pharmacogenomics' unchecked>Pharmacogenomics&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Pharmacogenomics' checked>Pharmacogenomics&nbsp;&nbsp;&nbsp;</label><br>";

                          $area = "Virtual drug screening";
                          $extract = mysqli_query($con,"select * from research_area where cid='$cid' and area='$area'");
                          $count = mysqli_num_rows($extract);
                          if($count == 0)
                            echo "<label><input type='checkbox' value='Virtual drug screening' unchecked>Virtual drug screening&nbsp;&nbsp;&nbsp;</label><br>";
                          else
                            echo "<label><input type='checkbox' value='Virtual drug screening' checked>Virtual drug screening&nbsp;&nbsp;&nbsp;</label><br>";

                      ?>
                    </div>
                  </div>
                </div>
                <br><label>Others</label>
                <input type="text" maxlength="50" class="form-control input-sm" id="other" name="other" placeholder="Other">
                <input style="margin-top:25px;" class="btn btn-success" id="register_btn" type="submit" onclick="addothers();" value="Add"/><br/><br/><br/>
                <label>Selected Research Areas</label><br><br>
                <div class="row">
                  <div class=" col-sm-6">
                    <ul class="list-group1">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $cid = $_SESSION['cid'];
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and stand='1'");
                        while($row = mysqli_fetch_array($extract))
                        {
                          $area = $row['area'];
                          echo '<li class="list-group-item">'.$area.'</li>';
                        }
                      ?>
                    </ul>
                  </div>
                  <div class="col-sm-6">
                    <ul class="list-group2">
                      <?php
                        $servername = "127.0.0.1";
                        $username = "root";
                        $password = "$@!Sai5171";
                        $database = "hackindia";
                        $con =  mysqli_connect($servername, $username, $password,$database);
                        $cid = $_SESSION['cid'];
                        $extract = mysqli_query($con,"select * from research_area where cid='$cid' and stand='0'");
                        while($row = mysqli_fetch_array($extract))
                        {
                          $area = $row['area'];
                          echo '<li class="list-group-item">'.$area.'</li>';
                        }
                      ?>
                    </ul>
                  </div>
                </div>
                <input style="margin-top:25px;" class="btn btn-success" id="register_btn" type="submit" onclick="upload();" value="Update"/>
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
  $("#result1").toggle();
  $("#result2").toggle();
  $("#result3").toggle();
  $("#result4").toggle();
  $("#result5").toggle();
  $("#result6").toggle();
  $("#result7").toggle();
  $("#result8").toggle();
  $("#result9").toggle();
  $( "input[type='checkbox']" ).click( function() {
    if($(this).prop("checked") == true)
    {
      $( ".list-group1" ).prepend( '<li class="list-group-item">'+$(this).val()+'</li>' );
    }
    else
    {
      var temp = $(this).val();
      $('.list-group1').children('li').each(function(index, element) {
        if(temp == $(element).text())
          $(element).remove();
      });
    }
  });
  function addothers()
  {
    if($.trim($("#other").val())!=="")
    {
      $( ".list-group2" ).prepend( '<li class="list-group-item">'+$("#other").val()+'</li>' );
      $("#other").val("");
    }
  }
  function upload()
  {
    var area = [];
    $('.list-group1').children('li').each(function(index, element) {
      area.push($(element).text());
    });
    $.ajax({type : 'post' , async : false , url : 'research_area_stand_s' , data : {area:area}});
    area = [];
    $('.list-group2').children('li').each(function(index, element) {
      area.push($(element).text());
    });
    $.ajax({type : 'post' , async : false , url : 'research_area_other_s' , data : {area:area}});
    // sweetalert
    swal(
      "Good job!",
      "Updated successfully.",
      "success"
    )
  }
</script>

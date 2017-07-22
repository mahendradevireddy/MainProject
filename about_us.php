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
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>About Us</title>
  </head>
  <!--<body onload="hello_message();">-->
  <body>
    <header>
      <!-- header -->
      <div class="container-fluid" id="heading">
        <div class="row">
          <div class="col-md-12">
            <h6 id="left">Feedback&nbsp;&nbsp;|&nbsp;&nbsp;Sitemap</h6>
            <h6 id="right">Skip&nbsp;to&nbsp;main&nbsp;content&nbsp;&nbsp;|&nbsp;&nbsp;Screen&nbsp;Reader&nbsp;Access<span id="scale">&nbsp;&nbsp;|&nbsp;&nbsp;A-&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;A+</span></h6>
          </div>
        </div>
      </div>
      <!-- logo image -->
      <div class="container-fluid" id="logo">
        <div class="row">
          <div class="col-sm-4">
            <a href="home"><img class="site-logo" src="images/icon.png"></a>
          </div>
          <div class="col-sm-4 col-sm-offset-4" style="margin-top: 25px;">
						<!-- login popup -->
						<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header" align="center">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<h3 class="modal-title" id="lineModalLabel">Login</h3>
									</div>
									<div class="modal-body">
										<form action="login_s" method="POST">
											<div class="form-group">
                        <label for="Email">Email</label>
                        <div class="input-group">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-envelope"></i></div>
												  <input type="email" class="form-control input-sm" id="Email" name="Email" placeholder="Email" autofocus required>
                        </div>
											</div>
											<div class="form-group">
												<label for="password">Password</label>
                        <div class="input-group">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
												  <input type="Password" minlength="8" maxlength="50" class="form-control input-sm" id="password" name="password" placeholder="Password" required>
                        </div>
											</div>
											<button type="submit" class="btn btn-success">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>
          </div>
        </div>
        <br>
      </div>
      <!-- navigation -->
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" onclick="myFunction(this)">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar bar1"></span>
              <span class="icon-bar bar2"></span>
              <span class="icon-bar bar3"></span>
            </button>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
              <li><a href="home">Home</a></li>
              <li class="active"><a href="about_us">About Us</a></li>
							<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Programmes <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Basic Research</a></li>
                  <li><a href="#">Medical Biotechnology</a></li>
                  <li><a href="#">Food and Nutrition</a></li>
                  <li><a href="#">Bioenergy</a></li>
                  <li><a href="#">Bioresources and Environment</a></li>
                  <li><a href="#">Agriculture Biotechnology</a></li>
                  <li><a href="#">Animal Biotechnology</a></li>
                  <li><a href="#">Aquaculture and Marine Biotechnology</a></li>
                  <li><a href="#">Theoretical and Computational Biology</a></li>
                  <li><a href="#">International Collaborations</a></li>
                  <li><a href="#">Human Resource Development</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Schemes<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Centres Of Excellence and Innovation in Biotechnology</a></li>
                  <li><a href="#">Research Resources, Service Facilities and Platforms</a></li>
                  <li><a href="#">Societal Development</a></li>
                  <li><a href="#">Biotech Parks and Incubators</a></li>
                  <li><a href="#">Rapid Grant for Young Investigators</a></li>
                  <li><a href="#">Glue Grant</a></li>
                  <li><a href="#">Special Programmes-North-East region</a></li>
                  <li><a href="#">Public Private Partnerships</a></li>
                  <li><a href="#">Women Scientist Scheme</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Institutions<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="institutes.php">Autonomous Institutions</a></li>
                  <li><a href="#">Public Sector Undertaking (PSU’s)</a></li>
                  <li><a href="#">Others</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Policies &amp; Regulations<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Policies</a></li>
                  <li><a href="#">Regulations</a></li>
                </ul>
              </li>
            </ul>

            <!--<ul class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </ul>-->
          </div>
        </div>
      </nav>
    </header>
    <section>
      <div class="container">
        <div class="well bs-component">
          <p><br>The Department of Biotechnology (DBT) is an Indian government department, under the Ministry of Science and Technology responsible for administrating development and commercialization in the field of modern biology and biotechnology in India. It was started in 1986. </p>
          <h4 style="font-weight:bold;"><br>VISION&nbsp;AND&nbsp;STRATEGY&nbsp;:-<br></h4>
          <p>Attaining new heights in biotechnology research, shaping biotechnology into a premier precision tool of the future for creation of the wealth and ensuring social justice-special for the welfare of the poor .</p>
          <h4 style="font-weight:bold;"><br>PURPOSE&nbsp;OF&nbsp;SMART&nbsp;CAREER :-<br></h4>
          <ol>
            <li>
              <p>The purpose of developing this online portal is to help government in finding the PhD scholars. </p>
            </li>
            <li>
              <p>The portal will be displaying the number of PhD scholars by both sate wise and university wise(using data visualization techniques). </p>
            </li>
            <li>
              <p>The candidates who have completed their doctoral research (PhD) or ongoing can register and upload their academic, personal, contact, research and work experience details. This information will be shared with all the DST Department through their respective login. </p>
            </li>
          <ol>
        </div>
      </div>
    </section>
    <footer>
    </footer>
  </body>
</html>
<script type="text/javascript">
  if($(document).width()<=500)
    $("#scale").hide();
  else
    $("#scale").show();
</script>

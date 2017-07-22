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
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Register</title>
    <style>
    </style>
  </head>
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
            <img class="site-logo" src="images/icon.png">
          </div>
          <div class="col-sm-4 col-sm-offset-4" style="margin-top: 25px;">
						<button data-toggle="modal" data-target="#squarespaceModal" style="float:right;margin-right: 15px;" class="btn btn-default">Login</button>
						<!-- login popup -->
						<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
									<h3 class="modal-title" id="lineModalLabel">Login</h3>
								</div>
								<div class="modal-body">
									<form action="login_s" method="POST">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control input-sm" id="Email" name="Email" placeholder="Email" autofocus required>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="Password" minlength="8" maxlength="50" class="form-control input-sm" id="password" name="password" placeholder="Password" required>
										</div>
                    <a onclick="forgot();" style="color:red;float:right;" onMouseOver="this.style.cursor='pointer'">Forgot Password ?</a>
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
              <li><a href="about_us">About Us</a></li>
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
      <?php
        if(isset($_SESSION['message']))
        {
          if( $_SESSION['message'] == "Aadhar number is already registered." || $_SESSION['message'] == "File too large. File must be less than 150 kilobytes." || $_SESSION['message'] == "Please select an image." || $_SESSION['message'] == "email id is already registered." || $_SESSION['message'] == "Institution registration already done.")
          {
            echo "<div class='container'>";
              echo "<div class='alert alert-danger alert-dismissable'>
                <a class='close' data-dismiss='alert' aria-label='close'>×</a>
                <strong>".$_SESSION['message']."</strong>
              </div>";
            echo "</div>";
            unset($_SESSION['message']);
          }
          else if($_SESSION['message'] == "Successfully registered. An activation mail has been send to your email id. Click on the activation link given in the mail to activate your account.")
          {
            echo "<div class='container'>";
              echo "<div class='alert alert-success alert-dismissable'>
                <a class='close' data-dismiss='alert' aria-label='close'>×</a>
                <strong>".$_SESSION['message']."</strong>
              </div>";
            echo "</div>";
            unset($_SESSION['message']);
          }
        }
      ?>
      <div class="col-lg-6 col-lg-offset-3">
        <div class="well bs-component">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#student" data-toggle="tab">Student</a></li>
            <li><a href="#institution" data-toggle="tab">Institution</a></li>
            <li><a href="#lab" data-toggle="tab">Company / Lab</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="student">
              <!-- student -->
              <br>
              <form class="form-horizontal" enctype="multipart/form-data" action="register_student_s" method="POST">
                <fieldset>
                  <legend align="left" style="padding: 0px 0px 10px 0px;">Student Registration</legend>
                  <!-- name -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Name</label>
                    <div class="col-lg-9" id="name">
                      <div style="float:left;clear:left;width: 100%;">
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <select class="form-control input-sm" id="named" name="named" style="width: 25%;" autofocus required>
                            <option value="Dr">Dr</option>
                            <option value="Mr">Mr</option>
                            <option value="Ms">Ms</option>
                          </select>
                        </div>
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <input type="name" class="form-control input-sm" id="namef" name="namef" placeholder="First Name" style="width: 100%;" required>
                        </div>
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <input type="name" class="form-control input-sm" id="namem" name="namem" placeholder="Middle Name" style="width: 100%;">
                        </div>
                        <div class="input-group" style="padding:0px 0px 0px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <input type="name" class="form-control input-sm" id="namel" name="namel" placeholder="Last Name" style="width: 100%;" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- email -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Email</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-envelope"></i></div>
                        <input type="email" class="form-control input-sm" id="Email" name="Email" placeholder="Email" required>
                      </div>
                    </div>
                  </div>
                  <!-- password -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                        <input type="Password" pattern=".{8,50}" minlength="8" maxlength="50" class="form-control input-sm" id="spassword" name="spassword" placeholder="Password" required>
                      </div>
                    </div>
                  </div>
                  <!-- passwordr -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Confirm&nbsp;Password</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                        <input type="Password" pattern=".{8,50}" minlength="8" maxlength="50" class="form-control input-sm" id="spasswordr" name="spasswordr" placeholder="Confirm Password" required>
                      </div>
                    </div>
                  </div>
                  <!-- aadhar -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Aadhar&nbsp;Number</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-comment"></i></div>
                        <input type="number" minlength="12" maxlength="12" class="form-control input-sm" id="aadhar" name="aadhar" placeholder="Aadhar Number" required>
                      </div>
                    </div>
                  </div>
                  <!-- phone -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Phone&nbsp;Number</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-earphone"></i></div>
                        <input type="number" minlength="10" maxlength="10" class="form-control input-sm" id="phone" name="phone" placeholder="Phone Number" required>
                      </div>
                    </div>
                  </div>
                  <!-- gender -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Gender</label>
                    <div class="col-lg-9">
                      <div class="radio">
                        <label>
                          <input type="radio" name="sex" value="Male" required>
                          Male
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="sex" value="Female">
                          Female
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="sex" value="Transgender">
                          Transgender
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- nationality -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Nationality</label>
                    <div class="col-lg-9">
                      <select class="form-control input-sm" id="nationality" name="nationality" required>
                        <option value="Indian">Indian</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>
                  </div>
                  <!-- photo -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Upload Photo</label>
                    <div class="col-lg-9">
                      <input type="file" name="file-1" id="file-1" multiple required>
                      <label class="btn btn-default btn-sm" id="file-1l" for="file-1" style="margin-top: 3px;"><span style="overflow: hidden;">Choose Image</span></label>
                    </div>
                  </div>
                  <!-- register -->
                  <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                      <input style="margin-top:25px;" class="btn btn-success" type="submit" name="register_btn" id="register_btn" value="Register"/>
                    </div>
                  </div>
                </fieldset>
              </form>
              <!-- student end -->
            </div>
            <div class="tab-pane fade" id="institution">
              <!-- institution -->
              <br>
              <form class="form-horizontal" enctype="multipart/form-data" action="register_institution_s" method="POST">
                <fieldset>
                  <legend align="left" style="padding: 0px 0px 10px 0px;">Institution Details</legend>
                  <!-- state -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">State</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-globe"></i></div>
                        <select class="form-control input-sm" id="state" name="state" style="width: 100%;" autofocus required>
                          <?php
                            $servername = "127.0.0.1";
                          	$username = "root";
                          	$password = "$@!Sai5171";
                          	$database = "hackindia";
                          	$con =  mysqli_connect($servername, $username, $password,$database);
                            $extract = mysqli_query($con,"select * from state_codes");
                            echo "<option>Select State</option>";
                            while($row = mysqli_fetch_array($extract))
                            {
                              $name = $row['name'];
                              $codes = $row['codes'];
                              echo "<option value='$codes'>$name</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- institution_name -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Institution Name</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-home"></i></div>
                        <select class="form-control input-sm" id="institution_name" name="institution_name" style="width: 100%;" disabled required>
                            <option>Select State First</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- address -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Address</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-road"></i></div>
                        <input type="text" class="form-control input-sm" id="address" name="address" placeholder="Address" disabled required>
                      </div>
                    </div>
                  </div>
                  <br><legend align="left" style="padding: 0px 0px 10px 0px;">Contact Person Details</legend>
                  <!-- name -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Name</label>
                    <div class="col-lg-9" id="name">
                      <div style="float:left;clear:left;width: 100%;">
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <input type="name" class="form-control input-sm" id="inamef" name="namef" placeholder="First Name" style="width: 100%;" disabled required>
                        </div>
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <input type="name" class="form-control input-sm" id="inamem" name="namem" placeholder="Middle Name" style="width: 100%;" disabled>
                        </div>
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <input type="name" class="form-control input-sm" id="inamel" name="namel" placeholder="Last Name" style="width: 100%;" disabled required>
                        </div>
                        <div class="input-group" style="padding:0px 0px 0px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-bookmark"></i></div>
                          <input type="name" class="form-control input-sm" id="inamed" name="named" placeholder="Designation" style="width: 50%;" disabled required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- email -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Email</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 0px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-envelope"></i></div>
                        <input type="email" class="form-control input-sm" id="iEmail" name="Email" placeholder="Email" disabled required>
                      </div>
                    </div>
                  </div>
                  <!-- phone -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Contact&nbsp;Number</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 0px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-earphone"></i></div>
                        <input type="number" minlength="10" maxlength="10" class="form-control input-sm" id="iphone" name="phone" placeholder="Contact Number" disabled required>
                      </div>
                    </div>
                  </div>
                  <!-- photo -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Upload Photo</label>
                    <div class="col-lg-9">
                      <input type="file" name="file-2" id="file-2" multiple required>
                      <label class="btn btn-default btn-sm" id="file-2l" for="file-2" style="margin-top: 3px;"><span style="overflow: hidden;">Choose Image</span></label>
                    </div>
                  </div>
                  <br><legend align="left" style="padding: 0px 0px 10px 0px;">Password Details</legend>
                  <!-- password -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 0px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                        <input type="Password" minlength="8" maxlength="50" class="form-control input-sm" id="ipassword" name="ipassword" placeholder="Password" disabled required>
                      </div>
                    </div>
                  </div>
                  <!-- passwordr -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Confirm&nbsp;Password</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 0px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                        <input type="Password" minlength="8" maxlength="50" class="form-control input-sm" id="ipasswordr" name="ipasswordr" placeholder="Confirm Password" disabled required>
                      </div>
                    </div>
                  </div>
                  <!-- register -->
                  <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                      <input style="margin-top:25px;" class="btn btn-success" type="submit" name="register_btn" id="iregister_btn" value="Register" disabled/>
                    </div>
                  </div>
                </fieldset>
              </form>
              <!-- institution end -->
            </div>
            <div class="tab-pane fade" id="lab">
              <!-- lab -->
              <br>
              <form class="form-horizontal" enctype="multipart/form-data" action="register_company_lab_s.php" method="POST">
                <fieldset>
                  <legend align="left" style="padding: 0px 0px 10px 0px;">Company / Lab</legend>
                  <!-- state -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">State</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-globe"></i></div>
                        <select class="form-control input-sm" name="cstate" style="width: 100%;" autofocus required>
                          <?php
                            $servername = "127.0.0.1";
                          	$username = "root";
                          	$password = "$@!Sai5171";
                          	$database = "hackindia";
                          	$con =  mysqli_connect($servername, $username, $password,$database);
                            $extract = mysqli_query($con,"select * from state_codes");
                            while($row = mysqli_fetch_array($extract))
                            {
                              $name = $row['name'];
                              $codes = $row['codes'];
                              echo "<option value='$codes'>$name</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- lab_name -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Company/Lab Name</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-home"></i></div>
                        <select class="form-control input-sm" id='cname' name="cname" style="width: 100%;" required>
                            <option>Biocon</option>
                            <option>Serum Institute of India</option>
                            <option>Panacea Biotech Ltd</option>
                            <option>Novo Nordisk</option>
                            <option>GlaxoSmithKline Pharmaceuticals Ltd.</option>
                            <option>SIRO Clinpharm</option>
                            <option>Novozymes, South Asia</option>
                            <option>Zydus Cadila</option>
                            <option>Indian Immunologicals</option>
                            <option>Wockhardt Ltd.</option>
                            <option>other</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- other -->
                  <div class="form-group" id="other_lab" style="display:none;">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-home"></i></div>
                        <input type="text" class="form-control input-sm" name="cother" placeholder="Other">
                      </div>
                    </div>
                  </div>
                  <!-- url -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Company/Lab web URL</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-road"></i></div>
                        <input type="text" class="form-control input-sm" name="curl" placeholder="URL" required>
                      </div>
                    </div>
                  </div>
                  <!-- address -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Address</label>
                    <div class="col-lg-9">
                      <div class="input-group">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-road"></i></div>
                        <input type="text" class="form-control input-sm" name="caddress" placeholder="Address" required>
                      </div>
                    </div>
                  </div>
                  <br><legend align="left" style="padding: 0px 0px 10px 0px;">Contact Person Details</legend>
                  <!-- name -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Name</label>
                    <div class="col-lg-9" id="name">
                      <div style="float:left;clear:left;width: 100%;">
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <input type="name" class="form-control input-sm" name="cnamef" placeholder="First Name" style="width: 100%;" required>
                        </div>
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <input type="name" class="form-control input-sm" name="cnamem" placeholder="Middle Name" style="width: 100%;">
                        </div>
                        <div class="input-group" style="padding:0px 0px 10px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                          <input type="name" class="form-control input-sm" name="cnamel" placeholder="Last Name" style="width: 100%;" required>
                        </div>
                        <div class="input-group" style="padding:0px 0px 0px 0px;">
                          <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-bookmark"></i></div>
                          <input type="name" class="form-control input-sm" name="cnamed" placeholder="Designation" style="width: 50%;" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- email -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Email</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 0px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-envelope"></i></div>
                        <input type="email" class="form-control input-sm" name="cEmail" placeholder="Email" required>
                      </div>
                    </div>
                  </div>
                  <!-- phone -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Contact&nbsp;Number</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 0px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-earphone"></i></div>
                        <input type="number" minlength="10" maxlength="10" class="form-control input-sm" name="cphone" placeholder="Contact Number" required>
                      </div>
                    </div>
                  </div>
                  <!-- photo -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Upload Photo</label>
                    <div class="col-lg-9">
                      <input type="file" name="file-3" id="file-3" multiple required>
                      <label class="btn btn-default btn-sm" id="file-3l" for="file-3" style="margin-top: 3px;"><span style="overflow: hidden;">Choose Image</span></label>
                    </div>
                  </div>
                  <br><legend align="left" style="padding: 0px 0px 10px 0px;">Password Details</legend>
                  <!-- password -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 0px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                        <input type="Password" minlength="8" maxlength="50" class="form-control input-sm" id="cpassword" name="cpassword" placeholder="Password" required>
                      </div>
                    </div>
                  </div>
                  <!-- passwordr -->
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Confirm&nbsp;Password</label>
                    <div class="col-lg-9">
                      <div class="input-group" style="padding:0px 0px 0px 0px;">
                        <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></div>
                        <input type="Password" minlength="8" maxlength="50" class="form-control input-sm" id="cpasswordr" name="cpasswordr" placeholder="Confirm Password" required>
                      </div>
                    </div>
                  </div>
                  <!-- register -->
                  <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                      <input style="margin-top:25px;" class="btn btn-success" type="submit" name="register_btn" id="register_btn" value="Register"/>
                    </div>
                  </div>
                </fieldset>
              </form>
              <!-- lab end -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer>
    </footer>
  </body>
</html>
<script type="text/javascript">
  var spassword = document.getElementById("spassword"), spasswordr = document.getElementById("spasswordr");
  function validatePasswords(){
    if(spassword.value != spasswordr.value) {
      spasswordr.setCustomValidity("Passwords Don't Match");
    } else {
      spasswordr.setCustomValidity('');
    }
  }
  spassword.onchange = validatePasswords;
  spasswordr.onkeyup = validatePasswords;

  var cpassword = document.getElementById("cpassword"), cpasswordr = document.getElementById("cpasswordr");
  function validatePassword(){
    if(cpassword.value != cpasswordr.value) {
      cpasswordr.setCustomValidity("Passwords Don't Match");
    } else {
      cpasswordr.setCustomValidity('');
    }
  }
  cpassword.onchange = validatePassword;
  cpasswordr.onkeyup = validatePassword;

  var password = document.getElementById("ipassword"), passwordr = document.getElementById("ipasswordr");
  function validatePassword(){
    if(password.value != passwordr.value) {
      passwordr.setCustomValidity("Passwords Don't Match");
    } else {
      passwordr.setCustomValidity('');
    }
  }
  password.onchange = validatePassword;
  passwordr.onkeyup = validatePassword;

  $("#file-1").change(function() {
    $("#file-1l").css("border","none");
    $("#file-1l").css("background-color","#3fb618");
    $("#file-1l").css("background-image","url('images/check.svg')");
    $("#file-1l").css("background-repeat","no-repeat");
    $("#file-1l").css("background-position","center");
    $("#file-1l").css("background-size","50px 30px");
  });

  $("#file-2").change(function() {
    $("#file-2l").css("border","none");
    $("#file-2l").css("background-color","#3fb618");
    $("#file-2l").css("background-image","url('images/check.svg')");
    $("#file-2l").css("background-repeat","no-repeat");
    $("#file-2l").css("background-position","center");
    $("#file-2l").css("background-size","50px 30px");
  });

  $("#file-3").change(function() {
    $("#file-3l").css("border","none");
    $("#file-3l").css("background-color","#3fb618");
    $("#file-3l").css("background-image","url('images/check.svg')");
    $("#file-3l").css("background-repeat","no-repeat");
    $("#file-3l").css("background-position","center");
    $("#file-3l").css("background-size","50px 30px");
  });

  if($(document).width()<=500)
    $("#scale").hide();
  else
    $("#scale").show();

  $("#aadhar").keyup(function(e) {
    var max = 12;
    if($("#aadhar").val().length >= max) {
      $("#aadhar").val($("#aadhar").val().substr(0, max));
    }
  });
  $("#state").change(function() {
    var code = $("#state").val();
    $.ajax({
			type:"POST",
			url:"institution_name",
			data: {code:code},
			success: function(response)
      {
				$("#institution_name").html(response);
      }
		});
  });
  $("#cname").change(function (){
    var temp = $("#cname").val();
    if(temp=="other")
    {
      $("#other_lab").css("display","");
    }
  });
  function forgot()
  {
    $('.modal').modal('toggle');
    swal({
      title: 'Submit email to reset your password.',
      input: 'email',
      showCancelButton: true,
      confirmButtonText: 'Submit',
      showLoaderOnConfirm: true,
      preConfirm: function (email) {
        return new Promise(function (resolve, reject) {
          var check = "0";
          $.ajax({
            type : 'post' ,
            async : false ,
            url : 'forgot_check' ,
            data : {email:email} ,
            success:function(output) {
              check = output;
            }
          });
          if(check=="0") {
            resolve();
          }
          else {
            setTimeout(function() {
              $.ajax({
                type : 'post' ,
                async : false ,
                url : 'forgot_s' ,
                data : {email:email} ,
                success:function(output) {
                  resolve();
                }
              });
            }, 0000)
          }
        })
      },
      allowOutsideClick: false
    }).then(function (email) {
      var check = "0";
      $.ajax({
        type : 'post' ,
        async : false ,
        url : 'forgot_check' ,
        data : {email:email} ,
        success:function(output) {
          check = output;
        }
      });
      if(check=="0") {
        swal({
          type: 'error',
          title: 'Your email id is not registered.',
          html: 'email: ' + email,
          width: 500,
          padding: 100,
          timer: 5500,
          showConfirmButton: false
        })
      }
      else {
        swal({
          type: 'success',
          title: 'Password has been send to',
          html: 'email: ' + email,
          width: 500,
          padding: 100,
          timer: 5500,
          showConfirmButton: false
        })
      }
    })
  }

  $("#state").change(function() {
    $("#institution_name").removeAttr('disabled');
  });
  $("#institution_name").change(function (){
    $("#address").removeAttr('disabled');
  });
  $("#address").change(function (){
    $("#inamef").removeAttr('disabled');
  });
  $("#inamef").change(function (){
    $("#inamem").removeAttr('disabled');
    $("#inamel").removeAttr('disabled');
  });
  $("#inamel").change(function (){
    $("#inamed").removeAttr('disabled');
  });
  $("#inamed").change(function (){
    $("#iEmail").removeAttr('disabled');
  });
  $("#iEmail").change(function (){
    $("#iphone").removeAttr('disabled');
  });
  $("#iphone").change(function (){
    $("#ipassword").removeAttr('disabled');
  });
  $("#ipassword").change(function (){
    $("#ipasswordr").removeAttr('disabled');
  });
  $("#ipasswordr").change(function (){
    $("#iregister_btn").removeAttr('disabled');
  });
</script>

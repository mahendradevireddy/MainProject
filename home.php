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
    <title>Smart Career</title>
    <style>
    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      /* Set the fixed height of the footer here */
      height: 60px;
      background-color: #f5f5f5;
    }
    </style>
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
						<a href="register" style="float:right;margin-right: 15px;" class="btn btn-default">Register</a>
            <button data-toggle="modal" data-target="#squarespaceModal" style="float:right;margin-right: 15px;" class="btn btn-default">Login</button>
						<!-- login popup -->
						<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header" align="center">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<h3 class="modal-title" id="lineModalLabel">Login</h3>
									</div>
									<div class="modal-body">
                    <?php
                      if(isset($_SESSION['message']))
                      {
                        if($_SESSION['message'] == "Sorry, Email or password is invalid." || $_SESSION['message'] == "Please activate your account and try again." || $_SESSION['message'] == "You have been successfully logged out.")
                        {
                          echo "<script>
                          if($(document).width()<=500)
                          {
                            swal({
                              title: '<span style=\'font-size:30px;color:#ff0039;\'>".$_SESSION['message']."<span>',
                              width: 250,
                              padding: 37.5,
                              timer: 2000,
                              showConfirmButton: false
                            });
                          }
                          else
                          {
                            swal({
                              title: '<span style=\'font-size:30px;color:#ff0039;\'>".$_SESSION['message']."<span>',
                              width: 500,
                              padding: 50,
                              timer: 2000,
                              showConfirmButton: false
                            });
                          }
                          </script>";
                          unset($_SESSION['message']);
                          session_unset();
                  				session_destroy();
                        }
                      }
                    ?>
										<form action="login_s" method="POST">
											<div class="form-group">
                        <label for="Email" style="text-align: left;">Email</label>
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
                      <div style="text-align: center;">
                        <button type="submit" class="btn btn-primary login btn-sm">Submit</button><br><br>
                        <a onclick="forgot();" style="color:red;" onMouseOver="this.style.cursor='pointer'">Forgot Password ?</a>
                      </div>
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
              <li class="active"><a href="home">Home</a></li>
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

            <ul class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section>
      <div class="flexslider-views-slideshow-main-frame-row flexslider_views_slideshow_slide views-row-5 views_slideshow_cycle_hidden views-row-odd clone" style="margin-top: -21px;">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" style="width: 100%;">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox" style="width: 100%;">
            <div class="item active" style="width: 100%;">
              <img src="images/1.jpg" alt="Chania" style="width: 100%;">
            </div>

            <div class="item">
              <img src="images/2.jpg" alt="Chania" style="width: 100%;">
            </div>

            <div class="item">
              <img src="images/3.jpg" alt="Flower" style="width: 100%;">
            </div>

            <div class="item">
              <img src="images/4.jpg" alt="Flower" style="width: 100%;">
            </div>
          </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <br>
      <!--
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-0">
            <div style="padding:0px 10px 0px 0px;height:245px;background-color:#e6f7ff;">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Vacancies</a></li>
              <li><a href="#profile" data-toggle="tab">Press Release</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home"><br>
                <p style="margin-left:5px;"></p>
                <ul style="list-style-type:disc;color:#3366ff;">
                  <li>CORRIGENDUM - Advt. for the Post of Director, Centre for DNA Fingerprinting and Diagnostic.</li>
                  <li>OVERSEAS ASSOCIATESHIP UNDER THE SPECIAL PROGRAMME FOR THE NORTHEAST: 2017-18.</li>
                  <li>DBT invites detailed proposals under the call on “Plant microbe interactions”.</li>
                  <li>Call for proposals through the Young Investigator Programme.</li>
                </ul>
              </div>
              <div class="tab-pane fade" id="profile"><br>
                <ol>
                  <li>
                    <a href="http://www.dbtindia.nic.in/dbt-is-geared-up-for-36-hour-smart-india-hackathon-2017-grand-finale-to-be-held-in-bhubaneswar-odisha/" style="margin-left:15px;text-align: justify;">
                      DBT is geared up for 36 hour Smart India Hackathon 2017 Grand Finale to be held in Bhubaneswar, Odisha
                    </a>
                  </li>
                  <li>
                    <a href="http://www.dbtindia.nic.in/gov-make-india-global-biotech-hub-2020/" style="margin-left:15px;text-align: justify;">
                      Government aims to make India a global Biotech Hub by 2020
                    </a>
                  </li>
                </ol>
              </div>
            </div>
            </div>
          </div>
          <div class="col-sm-4 col-sm-offset-0" style="height:245px;background-color:#e6f7ff;">
            <h4 align="center" class="list-group-item-heading">Photo Gallery</h4>
            <div class="row">
              <div class=col-sm-4>
                <img src="http://cache4.asset-cache.net/xt/178773433.jpg?v=1&g=fs1%7C0%7CSKP145%7C73%7C433&s=1&b=MEU4" style="height:100%;width:100%">
              </div>
              <div class=col-sm-4>
                <img src="http://cache4.asset-cache.net/xt/178773433.jpg?v=1&g=fs1%7C0%7CSKP145%7C73%7C433&s=1&b=MEU4" style="height:100%;width:100%">
              </div>
              <div class=col-sm-4>
                <img src="http://cache4.asset-cache.net/xt/178773433.jpg?v=1&g=fs1%7C0%7CSKP145%7C73%7C433&s=1&b=MEU4" style="height:100%;width:100%">
              </div>
            </div>
            <div class="row">
              <div class=col-sm-4>
                <img src="http://cache4.asset-cache.net/xt/178773433.jpg?v=1&g=fs1%7C0%7CSKP145%7C73%7C433&s=1&b=MEU4" style="height:100%;width:100%">
              </div>
              <div class=col-sm-4>
                <img src="http://cache4.asset-cache.net/xt/178773433.jpg?v=1&g=fs1%7C0%7CSKP145%7C73%7C433&s=1&b=MEU4" style="height:100%;width:100%">
              </div>
              <div class=col-sm-4>
                <img src="http://cache4.asset-cache.net/xt/178773433.jpg?v=1&g=fs1%7C0%7CSKP145%7C73%7C433&s=1&b=MEU4" style="height:100%;width:100%">
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-sm-offset-0">
            <h4 align="center" class="list-group-item-heading" style="color:#3366ff;">News and Events</h4>
            <div class="list-group">
              <a href="#" class="list-group-item">
                <p style="color:#3366ff;" class="list-group-item-text">Call for concept note/pre-proposal on monogenic disorders.</p>
              </a>
              <a href="#" class="list-group-item">
                <p style="color:#3366ff;" class="list-group-item-text">CALL FOR INVITING CONCEPT NOTES/ PRE-PROPOSALS UNDER “BIOTECHNOLOGY BASED PROGRAMME FOR SOCIETAL DEVELOPMENT- ACHIVE.</p>
              </a>
              <a href="#" class="list-group-item">
                <p style="color:#3366ff;" class="list-group-item-text">DBT invites detailed proposals under the call on “Plant microbe interactions”.</p>
              </a>
            </div>
          </div>
        </div>
      </div>-->
    </section>
    <!--
    <footer>
      <div class="container-fluid" style="height:45px;">
        <div class="row">
          <div class='col-sm-1'>
            <span style='color:white;'>Time : </span>
          </div>
          <div class="col-sm-1">
            <div id="time" style="color:white;"></div>
          </div>
          <div class="col-sm-1 col-sm-offset-3">
            <p style="color:white;text-align:justify;">Copyright&nbsp;&#9400;&nbsp;2014-2017&nbsp;All&nbsp;Right&nbsp;Reserved&nbsp;by</p>
            <p style="color:white;text-align:justify;margin-top:-10px;margin-left:25px;">Department&nbsp;of&nbsp;Biotechnology</p>
          </div>
        </div>
      </div>
    </footer>
  -->
  <footer class="footer">
    <div class="container">
      <p class="text-muted">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
            <p style="color:white;text-align:center;">Copyright&nbsp;&#9400;&nbsp;2014-2017&nbsp;All&nbsp;Right&nbsp;Reserved&nbsp;by</p>
            <p style="color:white;text-align:center;margin-top:-10px;">Department&nbsp;of&nbsp;Biotechnology</p>
          </div>
        </div>
      </p>
    </div>
  </footer>
  </body>
</html>
<script type="text/javascript">
  if($(document).width()<=500)
    $("#scale").hide();
  else
  {
    $("#scale").show();
    $(".modal-dialog").css("width","25%");
  }
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
  //time js
  (function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var today = new Date(),
            h = checkTime(today.getHours()),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
        document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
})();
</script>

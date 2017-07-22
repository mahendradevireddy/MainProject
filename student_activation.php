<?php
  session_start();
	$servername = "127.0.0.1";
	$username = "root";
	$password = "$@!Sai5171";
	$database = "hackindia";
	$con =  mysqli_connect($servername, $username, $password,$database);
  $email = $_SESSION['email'];
  $extract = mysqli_query($con,"SELECT * from users where email='$email' and verification='1'");
  $count = mysqli_num_rows($extract);
  if($count==1)
    header("location: student_personal");
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
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Scholar Activation</title>

  </head>
  <body>
    <header>

      <h1 align="center" style="padding: 10px 0px 0px 0px;">Scholar Activation</h1>
      <div class="container">
        <input style="float:right;" class="btn btn-success" type="submit" name="register_btn" id="register_btn" onclick="logout();" value="Logout"/>
      </div>
      <div class="container">
        <div class="jumbotron" style="margin-top:0px;">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <!-- state -->
              <div class="form-group">
                <label class="col-lg-3 control-label" style="margin-top:5px;">State</label>
                <div class="col-lg-9">
                  <div class="input-group" style="padding:0px 0px 10px 0px;">
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
                <label class="col-lg-3 control-label" style="margin-top:5px;">Institution Name</label>
                <div class="col-lg-9">
                  <div class="input-group" style="padding:0px 0px 10px 0px;">
                    <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-home"></i></div>
                    <select class="form-control input-sm" id="institution_name" name="institution_name" style="width: 100%;" required>
                        <option>Select State First</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- name -->
              <div class="form-group">
                <label class="col-lg-3 control-label" style="margin-top:5px;">Full Name</label>
                <div class="col-lg-9">
                  <div class="input-group" style="padding:0px 0px 10px 0px;">
                    <div class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></div>
                    <select class="form-control input-sm" id="name" name="name" style="width: 100%;" required>
                        <option>Select Institution Name First</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- submit -->
              <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                  <input style="margin-top:25px;" class="btn btn-success" type="submit" name="register_btn" id="register_btn_submit" onclick="student();" value="Submit" disabled>
                </div>
              </div>
            </div>
          </div>
          <h4 style="text-align:center;"><br><br>If your details are not available please contact your Institution.<br><br></h4>
          <div id="mail">
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
  $("#institution_name").change(function() {
    var name = $("#institution_name").val();
    $.ajax({
      type:"POST",
      url:"student_name",
      data: {name:name},
      success: function(response)
      {
        $("#name").html(response);
      }
    });
    $('#register_btn_submit').removeAttr('disabled');
  });
  function logout()
  {
    window.location.replace("logout");
  }
  function mail()
  {
    var mail = document.getElementById("mailid").innerHTML ;
    var message = $("#mail_message").val() ;
    var subject = "Student - Smart Career";
    $.ajax(
    {
      type:"POST",
      url:"send_mail",
      data: {mail:mail,message:message,subject:subject},
      success: function(response)
      {
        swal({
          title: '<span style=\'color:#ff0039;\'>Request has been send to institution.<span>',
          html: true,
          timer: 1500,
          showConfirmButton: false
        });
      }
    });
  }
  function student()
  {
    swal({
      title: 'Enter your roll number to approve',
      input: 'text',
      showCancelButton: true,
      confirmButtonText: 'Submit',
      showLoaderOnConfirm: true,
      allowEscapeKey: true,
      preConfirm: function (text) {
        return new Promise(function (resolve, reject) {
          var state = $("#state option:selected").text();
          var iname = $("#institution_name").val();
          var sname = $("#name").val();
          var roll = text;
          $.ajax(
          {
            type:"POST",
            url:"student_activation_s",
            data: {state:state,iname:iname,sname:sname,roll:roll},
            success: function(response)
            {
              var output = response.split('$@!');
              if(output[0]=="1")
              {
                swal(
                  'Your roll number has been verified.',
                  'You can update your profile now.',
                  'success'
                )
                setTimeout(function()
                {
                  window.location.replace("student_personal");
                }, 2000)
              }
              else
              {
                swal(
                  'Your roll number is not verified.',
                  'Contact your institution to update your details.',
                  'error'
                )
                var student_email = "<?php echo $_SESSION['email'];?>";
                var student_name = "<?php
                  $servername = "127.0.0.1";
                  $username = "root";
                  $password = "$@!Sai5171";
                  $database = "hackindia";
                  $con =  mysqli_connect($servername, $username, $password,$database);
                  $email = $_SESSION['email'];
                  $extract = mysqli_query($con,"select * from users where email='$email'");
                  $row = mysqli_fetch_array($extract);
                  echo $row['namef'];
                  echo "";
                  echo $row['namem'];
                  echo "";
                  echo $row['namel'];
                  mysqli_close($con);
                ?>";
                $("#mail").html("<div class='form-group'>To:<span id='mailid' style='font-size:18px;'> "+output[1]+"</span><br><span>Name: "+output[2]+"</span><br><textarea id='mail_message' style='resize: none;' class='form-control' placeholder='Message' disabled>The following student details is missing Name :"+student_name+", (email:"+student_email+"). Please check and update his/her details.</textarea><input class='btn btn-success' type='submit' onclick='mail();' value='Send'</div>");
              }
            }
          });
        })
      },
      allowOutsideClick: true
    }).catch(swal.noop);
  }
</script>

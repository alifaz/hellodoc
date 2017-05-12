<!DOCTYPE html>

<?php
    include "connect.php";
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Hello, Doc!</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--external css-->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!--JS css-->
    <link href="css/type.js" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!-- Transparent Navbar -->
      <div id="nav-header" class="container clearfix">
        <img alt="Hello, Doc!" class="pull-left" src="img/Login/Logo.png" width="160" height="100">
        <button id="login_button" class="on-login btn btn-link form-switch pull-right"
        data-form="login-page" data-toggle="modal"  style="background-color:#52e829; color: #fff; border:1px solid;"
        data-label="top-right" href="index.php#signinModal" style="margin">sign in</button>
      </div>

      <!-- Logo -->
      <div class="col-sm-8 col-sm-offset-2">
        <div class="headline center-text">

            <!-- typewritter -->
            <div class="headline center-text">
              <style>
                body {
                  background-color: transparent;
                  text-align: center;
                  color:black;
                  padding-top:10em;
                }

                #tulisan { color:#52e829; text-decoration: none;}
              </style>

              <h1>
                <a id="tulisan" href="" class="typewrite" data-period="2000"
                data-type='[ "Health Consultation.", "Healthy Life.", "Healthy Tips.", "Health Article.", "So,",
                "What Are You", " Waiting For?", "Lets Check Up!" ]'
                style="font-size:56px; font-weight: 700;">
                  <span class="wrap"></span>
                </a>
              </h1>
            </div>
          <p style="margin: 0 0 12px; font-size: 20px; color: #17a832; font-weight:200;">
            It is health that is real <b style="color: #3e38f4;">wealth</b> and not pieces of
            <b style="color: #3e38f4;">gold</b> and <b style="color: #3e38f4;">silver</b>.
          </p>
          <p style="margin: 0 0 12px; font-size: 16px; color: #17a832; font-weight:200;">
            - <b style="color: #ef4321;">Mahatma Gandhi</b>.
          </p>
        </div>
      </div>

      <!-- Modal Section -->

      <!-- Sign Up Form -->
	     <div id="signup-page">
	  	     <div class="container">

		      <form class="transparent form-login" style="background-color:transparent;" action="access/inputproccess.php" method="post">
            <form action="access/inputproccess.php" method="post">
		            <div class="login-wrap">
                  <input type="text" class="form-control" placeholder="Full Name" name="name" width="312" height="52" autofocus>
                  <br>
                  <input type="text" class="form-control" placeholder="Username" name="username" width="312" height="52" autofocus>
                  <br>
                  <input type="text" class="form-control" placeholder="Email" name="email" width="312" height="52" autofocus>
                  <br>
                  <input type="password" class="form-control" placeholder="Password" name="psw">
                  <br>
                  <input type="password" class="form-control" placeholder="Unique Code" name="uniquecode">
		                <label class="checkbox">
		                  </label>
		                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i>
                          <b>Let's Check Up</b></button>
		                        <hr>

		                          <div class="registration">
		                              Already have an account?<br/>
		                                <a  id="login_button2" class="form-switch"
                                    data-form="login-page" data-toggle="modal"  data-label="top-right" href="index.php#signinModal">
		                                  <b>
                                        Sign in
                                      </b>
		                                </a>
		                          </div>
		           </div>
             </form>

		          <!-- Forgot Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <form name = "create" action = "access/semilogin.php" method = "post">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your Data below to reset your password.</p>
                              <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                              <br>
                              <input type="password" name="uniquecode" placeholder="Unique Code" autocomplete="off" class="form-control placeholder-no-fix">
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="submit">Submit</button>
		                      </div>
		                  </div>
		              </div>
                </form>
		          </div>
		          <!-- modal -->

              <!-- Signup Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="signupModal" class="modal fade">
                <form action="access/inputproccess.php" method="post">
                  <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h2 class="modal-title"><center>Sign up</center></h2>
		                      </div>
		                      <div class="modal-body">
                		        <div class="login-wrap">
                              <input type="text" class="form-control" placeholder="Full Name" name="name" width="312" height="52" autofocus>
                              <br>
              		            <input type="text" class="form-control" placeholder="Username" name="username" width="312" height="52" autofocus>
              		            <br>
                              <input type="text" class="form-control" placeholder="Email" name="email" width="312" height="52" autofocus>
              		            <br>
              		            <input type="password" class="form-control" placeholder="Password" name="psw">
                              <br>
                              <input type="password" class="form-control" placeholder="Unique Code" name="uniquecode">
              		            <label class="checkbox">
              		            </label>
              		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i>
                                <b>Let's Check Up</b></button>
              		            <hr>

                                <div class="registration">
                		                Already have an account?<br/>
                                      <a data-toggle="modal" class="on-login btn btn-link form-switch"
                                      data-form="login-page" data-label="top-right" href="index.php#signinModal"
                                      onclick="document.getElementById('signinModal').style.display='none'" data-dismiss="modal">
                		                      Sign In
                		                  </a>
                		            </div>

                		        </div>

		                      </div>
		                  </div>
		              </div>
                </form>
		          </div>

              <!-- Login Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="signinModal" class="transparent modal fade">
                <form action="access/loginproccess.php" method="post">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h2 class="modal-title"><center>Sign in</center></h2>
		                      </div>
		                      <div class="modal-body">
                		        <div class="login-wrap">
                		            <input type="text" class="form-control" placeholder="Username or Email" name="username" autofocus>
                		            <br>
                		            <input type="password" class="form-control" placeholder="Password" name="psw">
                		            <label class="checkbox">
                		                <span class="pull-right">
                		                    <a data-toggle="modal" class="on-login btn btn-link form-switch pull-right"
                                        data-form="login-page" data-label="top-right" href="index.php#myModal"
                                        onclick="document.getElementById('signinModal').style.display='none'" data-dismiss="modal">
                                        Forgot Password?</a>

                		                </span>
                		            </label>
                		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Log In</button>
                		            <hr>

                		            <div class="registration">
                		                Don't have an account yet?<br/>
                                    <a data-toggle="modal" class="on-login btn btn-link form-switch"
                                    data-form="login-page" data-label="top-right" href="index.php#signupModal"
                                    onclick="document.getElementById('signinModal').style.display='none'" data-dismiss="modal">
                		                    Create an account
                		                </a>
                		            </div>

                		        </div>

		                      </div>
		                  </div>
		              </div>
                </form>
		          </div>
		          <!-- modal -->


		      </form>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("img/Login.doctor5.jpg", {speed: 5000});
        $.backstretch("img/Login/doctor2.jpg", {speed: 5000});
        $.backstretch("img/Login/doctor5.jpg", {speed: 5000});
    </script>

    <!-- typewritter JS -->
    <script>
      var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
      };

      TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
          this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
          this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
          delta = this.period;
          this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
          this.isDeleting = false;
          this.loopNum++;
          delta = 500;
        }

        setTimeout(function() {
          that.tick();
        }, delta);
      };

        window.onload = function() {
          var elements = document.getElementsByClassName('typewrite');
            for (var i=0; i<elements.length; i++) {
              var toRotate = elements[i].getAttribute('data-type');
              var period = elements[i].getAttribute('data-period');
              if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
              }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
          };
    </script>

  </body>
</html>

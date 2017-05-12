<!DOCTYPE html>

<?php
    include "connect.php";

    $iduser = isset($array['iduser']) ? $array['iduser'] : '';
    $query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$iduser'");
    $result = mysqli_fetch_array($query);
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Hello, Doc! || Reset Password</title>

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
      </div>

      <!-- Logo -->
      <div class="container">
        <div class="row">
          <div class="col-md-6">
          </div>
            <div class="col-md-6">
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
                      data-type='[ "Forgot Your Password?", "Do You Really...", "Perhaps...",
                      "Forgotten...", "Your Password?",  "Are You Insane?!", "So,",
                      "What Are You", "Waiting For?", "Change Password Now!" ]'
                      style="font-size:48px; font-weight: 700;">
                      <span class="wrap"></span>
                    </a>
                  </h1>
                </div>
                <p style="margin: 0 0 12px; font-size: 16px; color: #17a832; font-weight:200;">
                  I Change My Password everywhere to <b style="color: #3e38f4;">"Incorrect."</b> Because If I Forgot My Password System will always tell me that <b style="color: #3e38f4;">"Your Password is Incorrect."</b>.
                </p>
                <p style="margin: 0 0 12px; font-size: 12px; color: #17a832; font-weight:200;">
                  - <b style="color: #ef4321;">Anonymous</b>.
                </p>
                <form action="access/editproccess.php" method="post">
                    <div class="login-wrap">
                      <input type="hidden" name="iduser" value="<?php echo $result ['id_user'];?>">
                      <input type="text" class="form-control" placeholder="Email" name="email" width="312" height="52"
                      value="<?php echo $result ['email_user'];?>" autofocus required>
                      <br>
                      <input type="password" class="form-control" placeholder="New Password" name="psw"
                      value="<?php echo $result ['password_user'];?>" autofocus required>
                        <label class="checkbox">
                          </label>
                            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i>
                              <b>Changes Password</b></button>
                     </div>
                 </form>
              </div>
            </div>
          </div>
        </div>

      <!-- Login Button Right -->


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("img/Login.doctor1.jpg", {speed: 5000});
        $.backstretch("img/Login/doctor2.jpg", {speed: 5000});
        $.backstretch("img/Login/doctor1.jpg", {speed: 5000});
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

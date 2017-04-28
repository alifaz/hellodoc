<!DOCTYPE html>

<?php
    include "connect.php";
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hello, Doc!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!--CSS files-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!--JS files-->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <!-- Carousel 1 -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/Login/doctor1.jpg" alt="Doctor1">
        </div>

      <!-- Carousel 2 -->
        <div class="item">
          <img src="img/Login/doctor2.jpg" alt="Doctor2">
        </div>

        <!-- Carousel 3 -->
        <div class="item">
          <img src="img/Login/doctor5.jpg" alt="Doctor3">
        </div>

        <!-- Carousel 4 -->
        <div class="item">
          <img src="img/Login/doctor4.jpg" alt="Doctor4">
        </div>
      </div>

      <!-- Left and right controls -->
      <!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a> -->

      <!-- Forgot password form -->
      <?php
            include "connect.php";

            $id = $_GET['id_user'];
            $query = mysqli_query($conn, "SELECT * FROM hellodoc WHERE id_user = '$id'");
            $result = mysqli_fetch_array($query);
    ?>

          <div id="forgot password" class="w3-display-middle">
              <form class="modal-content animate" action="access/change.php" method="post">
                  <div class="imgcontainer">
                          <a href="#"><img src="img/Login/Logo.png" alt="Avatar" class="avatar"></a>
                        </div>

                      <div style="width:1200px; height:375px" class="container">
                        <table>
                          <tr>
                            <td><label ><b>Username</b></label></td>
                            <td> : </td>
                            <td><input style="width:250px;" type="text" placeholder="Enter Username or Email" name="username" value="<?php echo $result
    ['user_name'];?>" required></td>
                          </tr>
                          <tr>
                            <td><label><b>Email</b></label></td>
                            <td> : </td>
                            <td><input style="width:250px;" type="text" placeholder="Enter Password" name="email" value="<?php echo $result
    ['email_user'];?>" required></td>
                          </tr>
                          <tr>
                              <td><label><b>Former Password</b></label></td>
                              <td> : </td>
                              <td><input style="width:250px;" type="password" placeholder="Former Password" name="psw" value="<?php echo $result
      ['password_user'];?>" required></td>
                          </tr>
                          <tr>
                            <td><label><b>New Password</b></label></td>
                            <td> : </td>
                            <td><input style="width:250px;" type="password" placeholder="Enter Password" name="newpass" required></td>
                          </tr>
                        </table>
                        <table>
                        <tr class="w3-display-middle">
                          <input style="width:397px; background-color:#7aed74; color:white;" class=" btn btn-lg btn-left-align btn-orange btn-block enable" value="Change password" type="submit">
                        </tr>
                      </table>
                      </form>
                      <tr>
                        <footer  style="width:393px;" class="w3-center center-text">
                          Suddenly Remember Your Password ? <a href="#"><span onclick="document.getElementById('signup').style.display='none'; document.getElementById('login').style.display='block'; document.getElementById('forgot password').style.display='none'">Log in</span></a>
                        </footer>
                      </tr>
                  </div>
                </div>

      <!-- Sign Up form -->
      <div id="signup" class="w3-display-middle">
          <form class="modal-content animate" action="access/inputproccess.php" method="post">
              <div class="imgcontainer">
                      <a href="#"><img src="img/Login/Logo.png" alt="Avatar" class="avatar"></a>
                    </div>

                  <div style="width:1200px; height:375px" class="container">
                    <table>
                      <tr>
                        <td><label ><b>Name</b></label></td>
                        <td> : </td>
                        <td><input style="width:300px;" type="text" placeholder="Enter Username" name="name_user" required></td>
                      </tr>
                      <tr>
                        <td><label ><b>Username</b></label></td>
                        <td> : </td>
                        <td><input style="width:300px;" type="text" placeholder="Enter Username" name="username" required></td>
                      </tr>
                      <tr>
                        <td><label><b>Email</b></label></td>
                        <td> : </td>
                        <td><input style="width:300px;" type="text" placeholder="Enter Password" name="email" required></td>
                      </tr>
                      <tr>
                        <td><label><b>Password</b></label></td>
                        <td> : </td>
                        <td><input style="width:300px;" type="password" placeholder="Enter Password" name="psw" required></td>
                      </tr>
                    </table>
                    <table>
                    <tr class="w3-display-middle">
                      <input style="width:397px; background-color:#7aed74; color:white;" class=" btn btn-lg btn-left-align btn-orange btn-block enable" value="Sign Up" type="submit">
                    </tr>
                    <tr>
                      <footer  style="width:393px;" class="w3-center center-text">
                        Already Have An Account ? <a href="#"><span onclick="document.getElementById('signup').style.display='none'; document.getElementById('login').style.display='block'; document.getElementById('forgot password').style.display='none'">Log in</span></a>
                      </footer>
                    </tr>
                  </table>
                  </form>


              </div>
            </div>

          <!-- Login form -->
              <div id="login" class="w3-display-middle">
                  <form class="modal-content animate" action="access/loginproccess.php" method="post">
                      <div class="imgcontainer">
                              <a href="#"><img src="img/Login/Logo.png" alt="Avatar" class="avatar"></a>
                            </div>

                          <div style="width:1200px; height:375px" class="container">
                            <table>
                              <tr>
                                <td><label ><b>Username</b></label></td>
                                <td> : </td>
                                <td><input style="width:300px;" type="text" placeholder="Enter Username or Email" name="username" required></td>
                              </tr>
                              <tr>
                                <td><label><b>Password</b></label></td>
                                <td> : </td>
                                <td><input style="width:300px;" type="password" placeholder="Enter Password" name="psw" required></td>
                              </tr>
                            </table>

                            <div class="clearfix">
                                <a style="font-size:12px;" class="w3-center psw" href="#" name="forgotpsw"><span onclick="document.getElementById('signup').style.display='none'; document.getElementById('login').style.display='none'; document.getElementById('forgot password').style.display='block'"> Forgot password?</span></a>
                            </div>

                            <table>
                            <tr class="w3-display-middle">
                              <input style="width:397px; background-color:#7aed74; color:white;" class=" btn btn-lg btn-left-align btn-orange btn-block enable" value="Log in" type="submit">
                            </tr>
                          </table>
                          </form>
                          <tr>
                            <footer  style="width:393px;" class="w3-center center-text">
                              Don't Have An Account ? <a href="#"><span onclick="document.getElementById('signup').style.display='block'; document.getElementById('login').style.display='none'; document.getElementById('forgot password').style.display='none';">Sign Up</span></a>
                            </footer>
                          </tr>
                      </div>
                    </div>

                  <!-- For About Page -->
                  <div class="w3-padding w3-display-bottomright">
                     <a style="width:500px; color:black;" href="#"><b>About</b></a>
                  </div>

    </header>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>

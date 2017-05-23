<!DOCTYPE html>

<?php
	//session_start();
	include "../connect.php";

  $username_cek  = $_SESSION['username'];
  $password_cek  = $_SESSION['password'];

  $query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
  $result    = mysqli_fetch_array($query);


 // $username = $result['user_name'];
  //$email = $result['email_user'];
  //$name = $result['name_user'];
  //echo $username;
  //$birth = $result['name_user'];
  //$address = $result['name_user'];
  //$biography = $result['name_user'];
?>

<html lang="en">
	<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Profile Setting</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />

  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>
  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
			<header class="header black-bg">
							<div class="sidebar-toggle-box">
									<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
							</div>
						<!--logo start-->
						<a href="homepage.php" class="logo"><b>Hello, Doc!</b></a>
						<!--logo end-->
						<div class="top-menu">
							<ul class="nav pull-right top-menu">
										<li><a class="logout" href="../access/logoutuser.php">Log out</a></li>
							</ul>
						</div>
				</header>

      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
				<?php
					if ($_SESSION['authority']=="Patient")
				{ ?>
                   <p class="centered"><a href="profilepatient.php"><img src="opan.jpg" class="img-circle" width="60" height="60"></a></p>
				<?php }
				else if($_SESSION['authority']=="Doctor")
				{ ?>
					<p class="centered"><a href="profiledoctor.php"><img src="opan.jpg" class="img-circle" width="60" height="60"></a></p>
				<?php }
				else if($_SESSION['authority']=="Admin")
				{ ?>
					<p class="centered"><a href="profileadmin.php"><img src="opan.jpg" class="img-circle" width="60" height="60"></a></p>
				<?php } ?>
              	  <h5 class="centered"><?php echo $_SESSION['name']; ?></h5>
				  <h5 class="centered"><?php echo $_SESSION['authority']; ?></h5>

                  <li class="mt">
                      <a href="dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="meetthedoc.php">
                        <i class="fa fa-user-md" aria-hidden="true"></i>
                          <span>Meet The Doc!</span>
                      </a>
                  </li>

									<li class="sub-menu">
					            <a href="consultation.php">
					                <i class="fa fa-comments"></i>
					                <span>Consultation</span>
					            </a>
					        </li>

					        <li class="sub-menu">
					            <a href="javascript:;" >
					                <i class="fa fa-globe"></i>
					                <span>Share With The World!</span>
					            </a>
					            <ul class="sub">
					                <li><a  href="thread.php">Forum</a></li>
					                <li><a  href="your-thread.php">Your Thread</a></li>
					            </ul>
					        </li>

					        <li class="sub-menu">
					            <a class="active" href="javascript:;" >
					                <i class="fa fa-cogs"></i>
					                <span>Settings</span>
					            </a>
					            <ul class="sub">
					                <?php
									if ($_SESSION['authority']=="Patient")
									{ ?>
									  <li><a  href="profilepatient.php">Profile</a></li>
									<?php }
									else if ($_SESSION['authority']=="Doctor"){
										 ?>
										<li><a  href="profiledoctor.php">Profile</a></li>
										<?php
									}?>
									</ul>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
			<section id="main-content">
					<section class="wrapper">
						<h3><i class="fa fa-angle-right"></i> Settings</h3>

						<!-- BASIC FORM ELELEMNTS -->

							<div class="row mt">
								<div class="col-lg-12">
										<div class="form-panel">
												<h4 class="mb"><i class="fa fa-angle-right"></i> Profile</h4>
												<form class="form-horizontal style-form" method="post">
												<!--	<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Username</label>
															<div class="col-sm-10">
																	<input type="text" class="form-control" name="username "value="<?php echo $result['user_name'] ?>">
															</div>
													</div> -->
													<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Email</label>
															<div class="col-sm-10">
																	<input type="text" class="form-control" name="email" value="<?php echo $result['email_user'] ?>">
															</div>
													</div>
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">Name</label>
																<div class="col-sm-10">
																		<input type="text" class="form-control" name="name" value="<?php echo $result['name_user'] ?>">
																</div>
														</div>
													<!--	<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">Birth Date</label>
																<div class="col-sm-10">
																		<input type="text" class="form-control">
																</div>
														</div>

														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label" value="<?php/* echo $data['graduated'] */?>">Almamater</label>
																<div class="col-sm-10">
																		<input type="text" class="form-control">
																</div>
														</div>

														<div class="form-group">
																<label for="gender" class="col-sm-2 col-sm-2 control-label">Gender</label>
																<div class="col-sm-10">
																	<div class="radio">
																		<label>
																			<input type="radio" name="gender" id="gender" value="option1" checked>
																			Male
																		</label>
																	</div>
																	<div class="radio">
																		<label>
																			<input type="radio" name="gender" id="gender" value="option1">
																			Female
																		</label>
																	</div>
																</div>
														</div>
														<div class="form-group">
																<label for="specialization" class="col-sm-2 col-sm-2 control-label">Specialization</label>
																<div class="col-sm-10">
																	<div class="radio">
																		<label>
																			<input type="radio" name="specialization" id="specialization" value="option1" checked>
																			Umum
																		</label>
																	</div>
																	<div class="radio">
																		<label>
																			<input type="radio" name="specialization" id="specialization" value="option1">
																			Kandungan
																		</label>
																	</div>
																	<div class="radio">
																		<label>
																			<input type="radio" name="specialization" id="specialization" value="option1">
																			Dalam
																		</label>
																	</div>
																</div>
														</div>
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">Address</label>
																<div class="col-sm-10">
																		<textarea style="height:150px" type="text" class="form-control"></textarea>
																</div>
														</div>
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">Biography</label>
																<div class="col-sm-10">
																		<textarea style="height:200px" type="text" class="form-control"></textarea>
																</div>
														</div>-->
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label"></label>
																<div class="col-sm-10">
																		<button type="submit" class="btn btn-theme">Save</button>
																</div>
														</div>
														</form>
													</div>
												</div>
											</div>


		</section><! --/wrapper -->
			</section>
			<!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
			<footer class="site-footer">
          <div class="text-center">
              2017. Hello, Doc!
              <a href="profile.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jjquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

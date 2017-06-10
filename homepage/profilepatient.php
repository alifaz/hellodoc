<!DOCTYPE html>

<?php
	include "../connect.php";
	require_once "head-user.php";
	require_once "header-user.php";
  $username_cek  = $_SESSION['username'];
  $password_cek  = $_SESSION['password'];

  $query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
  $result    = mysqli_fetch_array($query);

?>

<html lang="en">

  <body>

  <section id="container" >

      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
				         <p class="centered"><a href="profil-user.php">
			 							<img src="<?php echo $result['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="60" height="60"></a></p>
			               	  <h5 class="centered"><?php echo $_SESSION['name']; ?><br>Pasien</h5>


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
						              <li><a  href="thread-new.php">Post a new thread</a></li>
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
              <!-- sidebar menu end-->
          </div>
      </aside>

			<section id="main-content">
					<section class="wrapper">
						<h3><i class="fa fa-angle-right"></i> Settings</h3>

						<!-- BASIC FORM ELELEMNTS -->

							<div class="row mt">
								<div class="col-lg-12">
										<div class="form-panel">
												<h4 class="mb"><i class="fa fa-angle-right"></i> Profile</h4>
												<!profil>
												<form action="profilepatient_edit.php" class="form-horizontal style-form" method="post">
													<img src="<?php echo $result['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="100" height="100"></a>
													<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Username</label>
															<div class="col-sm-10">
																	<?php echo $result['user_name'] ?>
															</div>
													</div>
													<div class="form-group">
															<label class="col-sm-2 col-sm-2 control-label">Email</label>
															<div class="col-sm-10">
																	<?php echo $result['email_user'] ?>
															</div>
													</div>
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">Name</label>
																<div class="col-sm-10">
																		<?php echo $result['name_user'] ?>
																</div>
														</div>
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">Birth Date</label>
																<div class="col-sm-10">
																		<?php echo $result['birthdate'] ?>
																</div>
														</div>
														<div class="form-group">
																<label for="gender" class="col-sm-2 col-sm-2 control-label">Gender</label>
																<div class="col-sm-10">
																	<?php echo $result['gender'] ?>
																</div>
														</div>
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">City</label>
																<div class="col-sm-10">
																		<?php echo $result['city'] ?>
																</div>
														</div>
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label"></label>
																<div class="col-sm-10">
																		<button type="submit" class="btn btn-theme">Edit Profile</button>
																</div>
														</div>

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

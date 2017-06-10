<!DOCTYPE html>

<?php
include "../connect.php";
	require_once "head-doc.php";
	require_once "header-doc.php";


	$username_cek  = $_SESSION['username'];
	$password_cek  = $_SESSION['password'];

	$query     = mysqli_query($conn, "SELECT * FROM doctor WHERE username = '$username_cek' and password = '$password_cek'");
	$result    = mysqli_fetch_array($query);
	$query2     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
	$result2    = mysqli_fetch_array($query2);
//	$_SESSION['name'] =
 ?>
  <body>

      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

								<p class="centered"><img src="<?php echo $result2['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="60" height="60"></a></p>
								<h5 class="centered"><?php echo $_SESSION['name']; ?><br>Dokter</h5>

                  <li class="mt">
                      <a href="dashboard-doc.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
					            <a href="consultation-doc.php">
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
								<div class="col-lg-6">
										<div class="form-panel">
												<h4 class="mb"><i class="fa fa-angle-right"></i> Profile</h4>
												<form class="form-horizontal style-form" action="../access/profiledoctorprocess.php" method="post">
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">Name</label>
																<div class="col-sm-10">
																		<input type="text" class="form-control" name="name" value="<?php echo $result['nama_doctor'] ?>">
																</div>
														</div>
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">Birth Date</label>
																<div class="col-sm-10">
																		<input type="text" class="form-control" name="birthdate" value="<?php echo $result['birthdate'] ?>">
																</div>
														</div>

														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">Almamater</label>
																<div class="col-sm-10">
																		<input type="text" class="form-control" name="graduated" value="<?php echo $result['graduated'] ?>">
																</div>
														</div>

														<div class="form-group">
																<label for="gender" class="col-sm-2 col-sm-2 control-label">Gender</label>
																<div class="col-sm-10">
																	<div class="radio">
																		<label>
																			<input type="radio" name="gender" id="gender" value="Male" checked>
																			Male
																		</label>
																	</div>
																	<div class="radio">
																		<label>
																			<input type="radio" name="gender" id="gender" value="Female">
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
																			<input type="radio" name="specialization" id="specialization" value="Umum" checked>
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
																		<textarea style="height:150px" type="text" class="form-control "name="address"><?php echo $result['address'] ?></textarea>
																</div>
														</div>
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label">Biography</label>
																<div class="col-sm-10">
																		<textarea style="height:200px" type="text" class="form-control" name="biography"><?php echo $result['biography'] ?></textarea>
																</div>
														</div>
														<div class="form-group">
																<label class="col-sm-2 col-sm-2 control-label"></label>
																<div class="col-sm-10">
																		<button type="submit" class="btn btn-theme" >Save</button>
																</div>
														</div>
													</form>
													</div>
												</div>
											<div class="col-lg-6">
												<div class="form-panel">
														<h4 class="mb"><i class="fa fa-angle-right"></i> Edit Photo Profile</h4>
														<!photo>
														<form action="../access/updatephoto-doc.php" name="uploader" method="post" enctype="multipart/form-data">
															<div class="w3-row">
																<div class="w3-col w3-center">
																	<img src="<?php echo $result2['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="100" height="100"></a>
																	<input type="file" placeholder="Upload your new photo, max 1 MB" name="photobaru">
																</div>
																<div class="w3-row w3-center">
																	<br><button class="btn btn-theme" type="submit" name="action">Submit</button>
																</div><br>
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

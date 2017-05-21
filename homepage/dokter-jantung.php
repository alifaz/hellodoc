<!DOCTYPE html>
<html lang="en">
<?php
	require_once "head-user.php";
	require_once "header-user.php";
		include "../connect.php";

	  $username_cek  = $_SESSION['username'];
	  $password_cek  = $_SESSION['password'];

	  $query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
	  $result    = mysqli_fetch_array($query);
	  $_SESSION['name'] = $result['name_user'];
 ?>
<title>Spesialis Jantung</title>
  <body>

  <section id="container" >
          <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="profile.html"><img src="opan.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['name']; ?><br>Pasien</h5>

                  <li class="mt">
                      <a href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="meetthedoc.php">
                        <i class="fa fa-user-md" aria-hidden="true"></i>
                          <span>Meet The Doc!</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
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
                          <li><a  href="blank.html">Post a Thread</a></li>
                          <li><a  href="login.html">Forum</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Settings</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Profile</a></li>
													<li><a  href="form_component.html">Account</a></li>
                      </ul>
                  </li>

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
      		<div class="row mt">
      			<div class="col-md-12">
      				<! -- BASIC BUTTONS -->
      				<div class="showback">
                <div class="sub-head" style="text-align: center; color: blue">
      						<h1>Dokter Spesialis Jantung</h1>
								</div>
                <div class="btn-group btn-group-justified">
									<div class="btn-group">
    								<a href="meetthedoc.php" class="btn btn-primary btn-lg" role="button"><i class="fa fa-user-md" aria-hidden="true"></i> Semua</a>
  								</div>
  								<div class="btn-group">
    								<a href="#" class="btn btn-success btn-lg" role="button"><i class="fa fa-stethoscope" aria-hidden="true"></i> Umum</a>
  								</div>
									<div class="btn-group">
										<a href="dokter-jantung.php" class="btn btn-info btn-lg" role="button"><i class="fa fa-child" aria-hidden="true"></i> Anak</a>
  								</div>
									<div class="btn-group">
										<a href="dokter-jantung.php" class="btn btn-danger btn-lg active" role="button"><i class="fa fa-heart" aria-hidden="true"></i> Jantung</a>
  								</div>
									<div class="btn-group">
										<a href="dokter-jantung.php" class="btn btn-warning btn-lg" role="button"><i class="fa fa-deaf" aria-hidden="true"></i> THT</a>
  								</div>
								</div>
								<div class="list-group">
                  <a href="profil-dokter.php" class="list-group-item"><img src="opan.jpg" class="img-circle" alt="Dr. Ghofar" width="60" height="60">	Dr. Ghofar<br>Spesialis Jantung</a>
                  <a href="#" class="list-group-item"><img src="opann.jpg" class="img-circle" alt="Dr. Opan" width="60" height="60"> Dr.Opan<br>Spesialis Jantung</a>
							  </div>
							</div>
              </div>
      			</div><!-- /col-lg-6 -->

      		</div><!--/ row -->
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php
					require_once "footer.php";
			 ?>
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

  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

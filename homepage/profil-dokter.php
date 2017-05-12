<?php
	include 'modul/connect.php';
	require 'head-user.php';

	if($_SESSION['status'] == "nouser"){
		header('Location:login.php');
	}
	else{
	   $id = $_SESSION['id_doctor'];
		$query = mysqli_query($conn, "SELECT * FROM doctor WHERE id_doctor = '$id'");
		$result = mysqli_fetch_array($query);
		$author = $result['nama_doctor'];
		$query2 = mysqli_query($conn, "SELECT * FROM letters WHERE author = '$author'");
		$query3 = mysqli_query($conn, "SELECT * FROM letters WHERE author = '$author'");
?>
<!DOCTYPE html>
<html lang="en">
  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
			<?php
        require_once "header-user.php";
       ?>

      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="profile.html"><img src="opan.jpg" class="img-circle" width="60" height:"60"></a></p>
              	  <h5 class="centered">M. Ghofar <br>Pasien</h5>

                  <li class="mt">
                      <a href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="general.php">
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
      			<div class="col-md-6">
      				<div class="showback">
								<div class="sub-head centered" style="color:#114017">
                  <h1>Profil Dokter</h1>
                </div>

                <div class="media">
                  <div class="media-left media-middle ">
                      <img src="opann.jpg" class="media-object img-circle" style="width:150px">
                    </div>
                  <div class="media-body"><br>
                      <h2 class="media-heading">Dr. Ghofar</h2>
                      <p>Spesialis Jantung</p>
                  </div>
                </div>

                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                      <div class="col-sm-10"><p class="form-control-static">dokter_opan@gmail.com</p></div>
                    <label class="control-label col-sm-2" for="email">Umur:</label>
                      <div class="col-sm-10"><p class="form-control-static">42 Tahun</p></div>
                    <label class="control-label col-sm-2" for="email">Gender:</label>
                      <div class="col-sm-10"><p class="form-control-static">Perempuan</p></div>
                    <label class="control-label col-sm-2" for="email">Kota:</label>
                      <div class="col-sm-10"><p class="form-control-static">Bogor</p></div>
                      <label class="control-label col-sm-2" for="email">Biografi:</label>
                    <div class="col-sm-10"><p class="form-control-static">- FK ITB 2002</p></div>
                  </div>
                </form>
							</div>
            </div>

            <div class="col-md-6">
      				<div class="showback">
								<div class="sub-head centered" style="color:#114017">
                    <h1>Konsultasi</h1>

                </div>
                <div class="form-group">
                    <label for="comment"><h4>Keluhan Singkat :</h4></label>
                    <textarea class="form-control" rows="2" id="comment" maxlength="140"></textarea>
                </div>
                <a href="#" class="btn btn-success" role="button">Kirim</a>
							</div>
            </div>
          </div>
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

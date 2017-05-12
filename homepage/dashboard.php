<!DOCTYPE html>
<html lang="en">
<?php
	require_once "head-user.php";
 ?>
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
			            <a class="active" href="index.html">
			                <i class="fa fa-dashboard"></i>
			                <span>Dashboard</span>
			            </a>
			        </li>

			        <li class="sub-menu">
			            <a href="general.php">
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
      			<div class="col-sm-12">
                	<div class="showback">
      					<h4><i class="fa fa-angle-right"></i> Tentang hellodoc.com</h4>
						<!-- Button trigger modal -->
						<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
						  Klik
						</button>

						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">hellodoc.com</h4>
						      </div>
						      <div class="modal-body">
                              		hellodoc.com adalah sebuah situs yang mempertemukan dokter dari banyak rumah sakit di Indonesia dengan pasien. Pasien dapat berkonsultasi dan mendapatkan solusi atas penyakit yang dideritanya. Dokter dapat menjangkau lebih banyak pasien yang membutuhkan bantuannya. Semua itu dapat dilakukan di sini, hellodoc.com.
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
      				</div><!-- /showback -->
      			</div>


                <div class="col-sm-4">
                	<div class="showback">
                    <img class="img-thumbnail" src="diabetes-blood-test.jpg" alt="Generic placeholder image" width="212" height="141">
          <h2>Diabetes Mengintai Remaja</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal2">Baca Lebih Banyak</button>

						<!-- Modal -->
						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Diabetes Mengintai Remaja</h4>
						      </div>
						      <div class="modal-body">
                              		Menurut penelitian yang dilakukan oleh
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
        			</div>
                </div>
                <div class="col-sm-4">
                	<div class="showback">
                    <img class="img-thumbnail" src="content-image.jpg" alt="Generic placeholder image" width="200" height="143">
          <h2>Ayo Cegah Osteoporosis</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal3">Baca Lebih Banyak
						</button>

						<!-- Modal -->
						<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Ayo Cegah Osteoporosis</h4>
						      </div>
						      <div class="modal-body">
                              Osteoporosis adalah penyakit tulang keropos.
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
        			</div>
                </div>
                <div class="col-sm-4">
                	<div class="showback">
                    <img class="img-thumbnail" src="gangguan-jiwa.jpg" alt="Generic placeholder image" width="280" height="157">
          <h2>Apa Itu Skizofrenia?</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal4">Baca Lebih Banyak</button>

						<!-- Modal -->
						<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Apa Itu Skizofrenia?</h4>
						      </div>
						      <div class="modal-body">
                              		Skizofrenia sering dipertukarkan dengan kepribadian ganda, padahal keduanya sebenarnya berbeda.
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
        			</div>
                </div>
            </div>
           </section>
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

<!DOCTYPE html>
<html lang="en">
<?php
		include "../connect.php";
		require_once "head-user.php";
		require_once "header-user.php";

	  $username_cek  = $_SESSION['username'];
	  $password_cek  = $_SESSION['password'];

	  $query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
	  $result    = mysqli_fetch_array($query);
	  $_SESSION['name'] = $result['name_user'];

		$_SESSION['id'] = $result['id_user'];
		$id = $_SESSION['id'];

		$query2 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_user = '$id' AND baca_pasien = 1 AND NOT status='yet'");
		$query3 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_user = '$id' AND baca_pasien = 1 AND NOT status='yet'");

 ?>
  <body>

  <section id="container" >
		<!togel down>
			<aside>
			<div id="sidebar"  class="nav-collapse ">
			  <ul class="sidebar-menu" id="nav-accordion">
						<p class="centered"><a href="profil-user.php">
							<img src="<?php echo $result['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="60" height="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['name']; ?><br>Pasien</h5>
			        <li class="mt">
			            <a class="active" href="dashboard.php">
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
			            <a href="javascript:;" >
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

			<!isi dashboard-doc>
			<section id="container" >
					<section id="main-content">
							<section class="wrapper">
								<div class="row mt">
										<div class="col-md-3">
											<div class="content-panel">
												<table class="table table-responsive table-striped table-advance table-hover">
														<h2 class="centered">Pemberitahuan Konsultasi</h2>
															<thead>
															<tr>
																	<th><h4>No</h4></th>
																	<th><h4>Doctor</h4></th>
																	<th><h4>Action</h4></th>
															</tr>
															</thead>
															<tbody>
																<?php
																$count = 1;
																if($result2 = mysqli_fetch_array($query3)){
																	while($result3 = mysqli_fetch_assoc($query2)){
																		echo '<tr>
																		<td class="hide-on-med-and-down">'.$count++.'</td>
																		<td>'.$result3['nama_doctor'].'</td>
																		<form class="form-horizontal style-form" action="consultation-patient-lihat.php" method="post">
																			<div class="form-group">
																			<div class="col-sm-10">
																			<td><button value="'.$result3['id_konsultasi'].'" name="id_konsultasi" type="submit" class="btn btn-info btn-md">Lihat</button>
																		</form>

																	</tr>';
																}
															}
																else {?>
																	<div class="alert alert-info">
																		Tidak ada pemberitahuan konsultasi.
																	</div>
																<?php
																 }
															 ?>
														</div>
														</tbody>
													</table>
												</div><!-- /content-panel -->
										</div><!-- /col-md-12 -->
								</div><!-- /row -->
							</section>
					</section>
      <!--main content end-->

      <!footer start-->
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

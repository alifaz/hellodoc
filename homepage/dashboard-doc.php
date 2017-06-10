<!DOCTYPE html>
<html lang="en">
<title>Dashboard</title>
<?php
	include "../connect.php";
	require_once "head-doc.php";
	require_once "header-doc.php";


		$username_cek  = $_SESSION['username'];
	  $password_cek  = $_SESSION['password'];

		$query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
		$result    = mysqli_fetch_array($query);
		$_SESSION['name'] = $result['name_user'];
		$nama = $_SESSION['name'];

		$_SESSION['id'] = $result['user_name'];
		$id = $_SESSION['id'];

		$query1 = mysqli_query($conn, "SELECT * FROM doctor WHERE username = '$id'");
		$result1 = mysqli_fetch_array($query1);
		$id_doc = $result1['id_doctor'];
		$query2 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_doctor = '$id_doc' AND baca = 1");
		$query3 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_doctor = '$id_doc' AND baca = 1");
 ?>
  <body>

  <section id="container" >
		<!Togel Down>
			<aside>
			<div id="sidebar"  class="nav-collapse ">
			    <!-- sidebar menu start-->
			    <ul class="sidebar-menu" id="nav-accordion">

						<p class="centered"><img src="<?php echo $result['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="60" height="60"></a></p>
								<h5 class="centered"><?php echo $_SESSION['name']; ?><br>Dokter</h5>

			        <li class="mt">
			            <a class="active" href="dashboard-doc.php">
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
			<section id="container" >
					<section id="main-content">
							<section class="wrapper">
								<div class="row mt">
										<div class="col-md-3">
											<div class="content-panel">
												<table class="table table-responsive table-striped table-advance table-hover">
														<h2 class="centered">Konsultasi Baru</h2>
															<thead>
															<tr>
																	<th><h4>No</h4></th>
																	<th><h4>Pasien</h4></th>
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
																		<td>'.$result3['name_user'].'</td>
																		<form class="form-horizontal style-form" action="consultation-doc-lihat.php" method="post">
																			<div class="form-group">
																			<div class="col-sm-10">
																			<td><button value="'.$result3['id_konsultasi'].'" name="id_konsultasi" type="submit" class="btn btn-info btn-md">Lihat</button>
																		</form>

																	</tr>';
																}
															}
																else {?>
																	<div class="alert alert-info">
																		Tidak ada konsultasi baru.
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

<!DOCTYPE html>
<html lang="en">
<title>Consultation</title>
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
		$query1 = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
		$query2 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_user = '$id' and baca_pasien = '1' AND NOT status='yet' ORDER BY id_konsultasi DESC");
		$query3 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_user = '$id' and baca_pasien = '1' AND NOT status='yet' ORDER BY id_konsultasi DESC");
		//$result2 = mysqli_fetch_array($query2);
		//$query3 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_user = '$id' ");
    $updatebaca = mysqli_query($conn, "UPDATE konsultasi SET baca_pasien=0 WHERE id_user='$id' and baca_pasien='1'");

		$result1 = mysqli_fetch_array($query1);
 ?>


  <body>
		<!dropdown-toggle>
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <ul class="sidebar-menu" id="nav-accordion">
    	<p class="centered"><img src="<?php echo $result['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="60" height="60"></a></p>
					<h5 class="centered"><?php echo $_SESSION['name']; ?><br>Pasien</h5>
    	<li class="mt">
        <a href="dashboard.php">
          <i class="fa fa-dashboard"></i><span>Dashboard</span>
        </a>
      </li>

      <li class="sub-menu">
				<a href="meetthedoc.php">
        	<i class="fa fa-user-md" aria-hidden="true"></i><span>Meet The Doc!</span>
        </a>
      </li>

      <li class="sub-menu">
        <a class="active" href="consultation.php">
        	<i class="fa fa-comments"></i><span>Consultation</span>
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
					<i class="fa fa-cogs"></i><span>Settings</span>
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

    </div>
</aside>
  <section id="container" >
		<!tabel konsultasi>
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
						 <table class="table table-responsive table-striped table-advance table-hover">
              <h2 class="centered">Daftar Konsultasi</h2>
            	<thead>
                <tr>
									<th><h4>No</h4></th>
                  <th><h4>Dokter</h4></th>
                  <th><h4>Keluhan Singkat<h4></th>
                  <th><h4>Status</h4></th>
									<th colspan="2"><h4>Menu</h4></th>
                </tr>
              </thead>
              <tbody>
								<?php
									$count = 1;
									if($result2 = mysqli_fetch_array($query3)){
										while($result3 = mysqli_fetch_assoc($query2)){
											if($result3['status']=="yet"){
												echo '<tr>
												<td class="hide-on-med-and-down">'.$count++.'</td>
												<td><a href="profil-user.php?id='.$result3['id_doctor'].'">'.$result3['nama_doctor'].'</a></td>
												<td>'.$result3['keluhan'].'</td>
												<td><h4><span class="label label-warning">Belum dikonfirmasi</h4></span></td>
												<td>
													<button class="btn btn-danger" data-toggle="modal" data-target="#Batal">
														<i class="fa fa-trash-o"></i>Batal
													</button>
												</td>
												<td></td>
											</div>
											</td>
											</tr>

											<div class="modal fade" id="Batal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title" id="myModalLabel">Cancel Consultation</h4>
														</div>
														<div class="modal-body">
															<p>Are you sure want to cancel?</p>
														<div class="modal-footer">
															<form action="../access/batal-proses.php" method="post">
																<button value="'.$result3['id_konsultasi'].'" name="id_konsultasi" type="submit" class="btn btn-primary">Yes</button>
															</form>
															<button data-dismiss="modal" class="btn btn-danger">No</a>
														</div>
													</div>
												</div>
											</div>';
											}

											else if($result3['status']=="terima"){
												echo '<tr class="success">
												<td class="hide-on-med-and-down">'.$count++.'</td>
												<td><a href="profil-user.php?id='.$result3['id_doctor'].'">'.$result3['nama_doctor'].'</a></td>
												<td>'.$result3['keluhan'].'</td>
												<td><h4><span class="label label-success">Diterima</h4></span></td>
												<td>
												<div class="btn-group btn-group-md">
													<form action="pesan.php?id='.$result3['id_konsultasi'].'" method="post">
														<button name="id_konsultasi" type="submit" class="btn btn-primary">
															<i class="fa fa-comments-o "></i> Hubungi
														</button>
													</form>
												</td>
												<td>
													<button class="btn btn-danger" data-toggle="modal" data-target="#hapus">
													  <i class="fa fa-trash-o"></i>
													</button>
												</td>
												</div>
												</td>
												</tr>

												<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												  <div class="modal-dialog">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												        <h4 class="modal-title" id="myModalLabel">Delete Consultation</h4>
												      </div>
												      <div class="modal-body">
						                    <p>Are you sure want to delete?</p>
												      <div class="modal-footer">
																<form action="../access/batal-proses.php" method="post">
																	<button value="'.$result3['id_konsultasi'].'" name="id_konsultasi" type="submit" class="btn btn-warning">Yes</button>
																	<button data-dismiss="modal" class="btn btn-danger">No</a>
																</form>
												      </div>
												    </div>
												  </div>
												</div>';
											}

											else if($result3['status']=="tolak"){
												echo '<tr class="danger">
												<td class="hide-on-med-and-down">'.$count++.'</td>
												<td><a href="profil-user.php?id='.$result3['id_doctor'].'">'.$result3['nama_doctor'].'</a></td>
												<td>'.$result3['keluhan'].'</td>
												<td><h4><span class="label label-danger">Ditolak</h4></span></td>
												<td>
													<a href="meetthedoc.php" class="btn btn-info btn-md" role="button">
													<i class="fa fa-user-md "></i> Buat konsultasi baru</a>
												</td>
												<td>
												<button class="btn btn-danger" data-toggle="modal" data-target="#hapus">
													<i class="fa fa-trash-o"></i>
												</button>
											</td>
											</div>
											</td>
											</tr>

											<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title" id="myModalLabel">Delete Consultation</h4>
														</div>
														<div class="modal-body">
															<p>Are you sure want to delete?</p>
														<div class="modal-footer">
															<form action="../access/batal-proses.php" method="post">
																<button value="'.$result3['id_konsultasi'].'" name="id_konsultasi" type="submit" class="btn btn-warning">Yes</button>
																<button data-dismiss="modal" class="btn btn-danger">No</a>
																</form>
												      </div>
												    </div>
												  </div>
												</div>';
											}
										}
									}
									else {
									?>
										<tr colspan="6"><td>
										<div class="alert alert-info col-sm-4">
  										Belum ada konsultasi, buat <a href="meetthedoc.php">konsultasi</a> sekarang!
										</div>
									</td></tr>
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
			<!modal>
			<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Profil</button>
							<h4 class="modal-title" id="myModalLabel">Diabetes Mengintai Remaja</h4>
						</div>
						<div class="modal-body">
														<?php echo $var ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
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
<?php
	require 'footer.php';
?>

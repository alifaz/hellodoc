<!DOCTYPE html>
<html lang="en">
<title>Consultation</title>
<?php
	require_once "head-doc.php";
	require_once "header-doc.php";
		include "../connect.php";

		$username_cek  = $_SESSION['username'];
	  $password_cek  = $_SESSION['password'];

		$query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
		$result    = mysqli_fetch_array($query);
		$_SESSION['name'] = $result['name_user'];
		$nama = $_SESSION['name'];

		$_SESSION['id'] = $result['user_name'];
		$id = $_SESSION['id'];

		$query1 = mysqli_query($conn, "SELECT * FROM doctor WHERE username = '$id'");
		$query2 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE nama_doctor = '$nama' ");
		$query3 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_user = '$id' ");
 ?>


  <body>
		<!dropdown-toggle>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="opann.jpg" class="img-circle" width="60"></a></p>
						<h5 class="centered"><?php echo $nama;?><br>Dokter</h5>
            <li class="mt">
                <a href="dashboard-doc.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                  <a class="active" href="consultation-doc.php">
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
    </div>
</aside>
<!tabel konsultasi>
  <section id="container" >
      <section id="main-content">
          <section class="wrapper">
            <div class="row mt">
                <div class="col-md-12">
									<div class="content-panel">
										<table class="table table-responsive table-striped table-advance table-hover">
												<h2 class="centered">Daftar Konsultasi</h2>
													<thead>
													<tr>
															<th><h5>No</h5></th>
															<th><h5>Pasien</h5></th>
															<th><h5>Keluhan Singkat<h5></th>
															<th><h5>Status</h5></th>
															<th><h5>Konfirmasi</h5></th>
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
																<td>'.$result3['name_user'].'</td>
																<td>'.$result3['keluhan'].'</td>
																<td><h4><span class="label label-warning">Menunggu konfirmasi</h4></span></td>
																<td>
																<form action="../access/terima-proses.php" method="post">
																	<button value="'.$result3['id_konsultasi'].'" name="id_konsultasi" type="submit" class="btn btn-success btn-md">
																	<i class="fa fa-check "></i> Terima</button>
																</form>
																<form action="../access/tolak-proses.php" method="post">
																	<button value="'.$result3['id_konsultasi'].'" name="id_konsultasi" type="submit" class="btn btn-danger btn-md">
																	<i class="fa fa-ban "></i> Tolak</button>
																</form>
																</td>
															</tr>';
														}
														else if($result3['status']=="terima"){
																			echo '<tr>
																			<td class="hide-on-med-and-down">'.$count++.'</td>
																			<td>'.$result3['name_user'].'</td>
																			<td>'.$result3['keluhan'].'</td>
																			<td><h4><span class="label label-success">Diterima</h4></span></td>
																			<td>
																				<a href="chat-doc.php" value="'.$result3['id_konsultasi'].'" name="id_konsultasi" type="submit" class="btn btn-primary">
																				<i class="fa fa-comments-o "></i> Hubungi</a>
																				<form action="../access/batal-doc-proses.php" method="post">
																					<button value="'.$result3['id_konsultasi'].'" name="id_konsultasi" type="submit" class="btn btn-warning">
																					<i class="fa fa-trash-o "></i> Hapus</button>
																				</form>
																			</td>
																		</tr>';
																	}
														else if($result3['status']=="tolak"){
															echo '<tr>
															<td class="hide-on-med-and-down">'.$count++.'</td>
															<td>'.$result3['name_user'].'</td>
															<td>'.$result3['keluhan'].'</td>
															<td><h4><span class="label label-danger">Ditolak</h4></span></td>
															<td>
															<form action="../access/batal-doc-proses.php" method="post">
																<button value="'.$result3['id_konsultasi'].'" name="id_konsultasi" type="submit" class="btn btn-warning">
																<i class="fa fa-trash-o "></i> Hapus</button>
															</form>
															</td>
															</tr>';
														}
														}}
														else {?>
															<div class="alert alert-info col-sm-4">
  															Belum ada konsultasi.
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
			<!-- Modal -->
			<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Menghapus</h4>
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

<!DOCTYPE html>
<html lang="en">
<title>Consultation</title>
<?php
	include "../connect.php";
	if ($_SESSION['authority']=="Patient"){
		require_once "head-user.php";
		require_once "header-user.php";
	}
	else if($_SESSION['authority']=="Doctor"){
		require_once "head-doc.php";
		require_once "header-doc.php";
	}

	  $username_cek  = $_SESSION['username'];
	  $password_cek  = $_SESSION['password'];

	  $query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
	  $result    = mysqli_fetch_array($query);

	  $_SESSION['name'] = $result['name_user'];
		$nama = $_SESSION['name'];

		$_SESSION['id'] = $result['id_user'];
		$id = $_SESSION['id'];

		$id_konsul = $_GET['id'];
		$_SESSION['id_konsultasi'] = $id_konsul;

		$query2     = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_konsultasi = '$id_konsul'");
	  $result2    = mysqli_fetch_array($query2);
		$nama_doc = $result2['nama_doctor'];
		$nama_pasien = $result2['name_user'];

 ?>


  <body>
		<!dropdown-toggle>
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <ul class="sidebar-menu" id="nav-accordion">
    	<p class="centered"><img src="<?php echo $result['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="60" height="60"></a></p>
					<h5 class="centered"><?php echo $_SESSION['name'];
						if ($_SESSION['authority']=="Patient")
					{ ?>
							<h5 class="centered">Pasien</h5>
					<?php }
					else if($_SESSION['authority']=="Doctor")
					{ ?>
							<h5 class="centered">Dokter</h5>
					<?php }?>
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
							<div class="container">
								<div class="row">
								<h3 class="centered" >Consultation Room</h3>

							<div class="col-md-11">
								<div class="panel panel-info">
									<div class="panel-heading" >
										<p class="centered"style="display:block-inline; font-size:20px">
											<?php
											if ($_SESSION['authority']=="Patient"){
												echo $nama_doc;
											}
											else if($_SESSION['authority']=="Doctor"){
												echo $nama_pasien;
											}
											?>
											<div class="goright">
												<a href="pesan.php?id=<?php echo $id_konsul ?>"><i class="fa fa-refresh"></i>Refresh</a>
											</div>
										</p>

										</div>

									<div class="panel-body">
										<div style="height: 300px; overflow: auto;">
										<?php
											$query1 = mysqli_query($conn, "SELECT * FROM pesan WHERE id_konsultasi ='$id_konsul'");

												if(mysqli_num_rows($query1) > 0){
													while($row = mysqli_fetch_assoc($query1)){

														if($row['username']== $username_cek){
															?>
															<tr>
																<?php
															$pesan=$row['pesan'];
															$str=str_replace("\n", "<br />", "$pesan");
															echo
																'<div class="form-group" style="text-align:right">
																	<td><span style="color:darkgreen">'.$str.'</span><br></td>
																	<td><span class="glyphicon glyphicon-time"></span> '.date_format(date_create($row['timestamp']),"h:m").'</p></td>
																</div>
																<hr>';?>
															</tr>

															<?php
														}
														else{
															$pesan=$row['pesan'];
															$str=str_replace("\n", "<br />", "$pesan");
															echo
																'
																	<div class="form-group">
																	<td><p>'.$row['nama_pengirim'].'<br></td>
																	<td><span style="color:darkblue">'.$str.'</span><br></td>
																	<td><span class="glyphicon glyphicon-time"></span> '.date_format(date_create($row['timestamp']),"h:m").'</p></td>
																	</div>
																	<hr>';
														}

												}
											}
										?>
									</div>
								</div>

									<div class="panel-footer">
										<form class="form-horizontal style-form" action="../access/pesan-proses.php" method="post">
											<div class="input-group">
											<input id="btn-input" type="text" name="pesan" class="form-control input-lg" maxlength="140" placeholder="Konsultasikan disini..."></br>
											<div class="input-group-btn">
								  			<button name="id_konsultasi" type="submit" class="btn btn-info btn-lg" >Kirim</button>
											</div>
										</div>
									</form>
								</div>

							</div>
						</div>
<!--
								<div class="col-md-12">
								<div class="panel panel-primary">
								<div class="panel-heading">
									<h4 class="centered">Opan</h4>
								</div>
      								<div class="panel-body">
												<form class="form-horizontal style-form" action="../access/pesan-proses.php" method="post">
													<div class="form-group">
														<div class="col-sm-12">
															<textarea rows="2" type="text" class="form-control" maxlength="250" placeholder="Tuliskan konsultasi anda" name="pesan" required>
						                  </textarea><br>
															<button type="submit" class="btn btn-theme">Kirim</button>
														</div>
													</div>
												</form>
											</div>
    						</div>

                    </div>
                </div>-- /col-md-12 -->
            </div><!-- /row -->
          </section>
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
<?php
	require 'footer.php';
?>

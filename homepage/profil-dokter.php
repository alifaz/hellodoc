<?php
	require_once "head-user.php";
	require_once "header-user.php";
		include "../connect.php";

	  $username_cek  = $_SESSION['username'];
	  $password_cek  = $_SESSION['password'];

	  $query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
	  $result    = mysqli_fetch_array($query);
	  $_SESSION['name'] = $result['name_user'];

		$id_doctor_cek    = $_POST['edit'];

		$query = mysqli_query($conn, "SELECT * FROM doctor where id_doctor = $id_doctor_cek");
		$data = mysqli_fetch_array($query);
		if($data['id_doctor']){
			$_SESSION['id_doctor'] = $data['id_doctor'];

		}
 ?>
<!DOCTYPE html>
<html lang="en">
  <body>

  <section id="container" >
			<!-Togel Down>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion">
            	  <p class="centered"><a href="profile.html"><img src="opan.jpg" class="img-circle" width="60" height:"60"></a></p>
            	  <h5 class="centered"><?php echo $_SESSION['name']; ?><br>Pasien</h5>

								<li class="mt">
                  <a href="dashboard.php">
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
                  <a href="consultation.php" >
                    <i class="fa fa-comments" aria-hidden="true"></i>
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
          </div>
      </aside>

			<! Profil Dokter>
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
                      <h2 class="media-heading"><?php echo $data['nama_doctor'] ?></h2>
                      <p>Spesialis Jantung</p>
                  </div>
                </div>

                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                      <div class="col-sm-10"><p class="form-control-static"><?php echo $data['email'] ?></p></div>
                    <label class="control-label col-sm-2" for="email">Umur:</label>
                      <div class="col-sm-10"><p class="form-control-static">42 Tahun</p></div>
                    <label class="control-label col-sm-2" for="email">Gender:</label>
                      <div class="col-sm-10"><p class="form-control-static"><?php echo $data['gender'] ?></p></div>
                    <label class="control-label col-sm-2" for="email">Kota:</label>
                      <div class="col-sm-10"><p class="form-control-static"><?php echo $data['address'] ?></p></div>
                      <label class="control-label col-sm-2" for="email">Biografi:</label>
                    <div class="col-sm-10"><p class="form-control-static"><?php echo $data['biography'] ?></p></div>
                  </div>
                </form>
							</div>
            </div>
						<! Konsultasi >
            <div class="col-md-6">
      				<div class="showback">
								<div class="sub-head centered" style="color:#114017">
                    <h1>Konsultasi</h1>

                </div>
                <div class="form-group">
                    <label for="comment"><h4>Keluhan Singkat :</h4></label>
										<form action="../access/konsul-proses.php" method="post">
											<textarea name="keluhan" class="form-control" rows="2" id="comment" maxlength="140" placeholder="Tulis keluhan anda.."></textarea>
											<td><button type="submit" class="btn btn-success" data-toggle="modal" data-target="#kirimkonsul">Kirim</button></td>
										</form>

                </div>
              </div>
            </div>
          </div>
          </section>
      </section><!-- /MAIN CONTENT -->
			<!-- Modal -->
			<div class="modal fade" id="kirimkonsul" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Permintaan konsultasi</h4>
						</div>
						<div class="modal-body">
														<h5>Konsultasi anda telah dikirim. Silahkan tunggu konfirmasi dari dokter.</h5>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Oke</button>
						</div>
					</div>
				</div>
			</div>
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

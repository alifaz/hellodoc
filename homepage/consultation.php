<!DOCTYPE html>
<html lang="en">
<title>Consultation</title>
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


  <body>
		<!dropdown-toggle>
<aside>
    <div id="sidebar"  class="nav-collapse ">
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
                <a href="meetthedoc.php">
                  <i class="fa fa-user-md" aria-hidden="true"></i>
                    <span>Meet The Doc!</span>
                </a>
            </li>

            <li class="sub-menu">
                  <a class="active" href="consultation.php">
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
                                <th><h4>Dokter</h4></th>
                                <th><h4>Keluhan Singkat<h4></th>
                                <th><h4>Status</h4></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="profil-dokter.php"><h5>Dr. Bambang</h5></a></td>
                                <td><h5>Diare udah 3 hari<h5></td>
                                <td><h4><span class="label label-warning">Belum dikonfirmasi</h4></span></td>
                                <td><a href="batalproses.php" class="btn btn-danger btn-md" role="button"><i class="fa fa-ban "></i> Batal</a></td>
                            </tr>
														<tr>
                                <td><a href="profil-dokter.php"><h5>Dr. Nugraha</h5></a></td>
                                <td><h5>Batuk udah 3 hari<h5></td>
                                <td><h4><span class="label label-success">Sudah diterima</h4></span></td>
                                <td>
																	<a href="chat-user.php" class="btn btn-primary btn-md" role="button"><i class="fa fa-comments-o "></i> Hubungi</a>
																	<a href="hapusproses.php" class="btn btn-warning btn-md" role="button"><i class="fa fa-trash-o "></i> Hapus</a>
																</td>
                            </tr>
														<tr>
                                <td><a href="profil-dokter.php"><h5>Dr. Linda</h5></a></td>
                                <td><h5>Vertigo udah 3 hari<h5></td>
                                <td><h4><span class="label label-danger">Ditolak</h4></span></td>
                                <td>
																	<a href="general.php" class="btn btn-info btn-md" role="button"><i class="fa fa-user-md "></i> Buat konsultasi baru</a>
																</td>
                            </tr>
                            </tbody>

                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->
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

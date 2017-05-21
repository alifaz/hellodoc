<?php
	//require_once '../pental.php';
	require "head-user.php";
	require "header-user.php";
	include "../connect.php";

	$username_cek  = $_SESSION['username'];
	$password_cek  = $_SESSION['password'];

	$query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
	$result    = mysqli_fetch_array($query);
	$_SESSION['name'] = $result['name_user'];
?>
<!DOCTYPE html>
<html lang="en">
<title>Spesialisasi Dokter</title>
</header>
</head>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="profile.html"><img src="opan.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered"><?php echo $_SESSION['name']; ?><br>Pasien</h5>

            <li class="mt">
                <a href="dashboard.php">
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
                <a href="consultation.php">
                    <i class="fa fa-comments" aria-hidden="true"s></i>
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

  <body>
  <section id="container" >
      <section id="main-content">
          <section class="wrapper">
      		<div class="row mt">
      			<div class="col-md-12">
      				<div class="showback">
								<div class="sub-head" style="text-align: center; color:#114017">
      						<h1>Spesialisasi Dokter</h1>
                	<p>Temukan dokter berdasarkan spesialisasi!</p>
								</div>

								<! button spesialisasi >
								<div class="btn-group btn-group-justified">
									<div class="btn-group">
    								<a href="general.php#" class="btn btn-primary btn-lg active" role="button">
											<i class="fa fa-user-md" aria-hidden="true"></i> Semua</a>
  								</div>
  								<div class="btn-group">
    								<a href="#" class="btn btn-success btn-lg" role="button">
											<i class="fa fa-stethoscope" aria-hidden="true"></i> Umum</a>
  								</div>
									<div class="btn-group">
										<a href="dokter-jantung.php" class="btn btn-info btn-lg" role="button">
											<i class="fa fa-child" aria-hidden="true"></i> Anak</a>
  								</div>
									<div class="btn-group">
										<a href="dokter-jantung.php" class="btn btn-danger btn-lg" role="button">
											<i class="fa fa-heart" aria-hidden="true"></i> Jantung</a>
  								</div>
									<div class="btn-group">
										<a href="dokter-jantung.php" class="btn btn-warning btn-lg" role="button">
											<i class="fa fa-deaf" aria-hidden="true"></i> THT</a>
  								</div>
								</div>

								<! list dokter >

								<div class="list-group">
                  <?php
											$count = 1;
											$query1 = mysqli_query($conn, "SELECT * FROM doctor");
											if(mysqli_num_rows($query1) > 0){
											while($row = mysqli_fetch_assoc($query1)){
											echo '<a href="profil-dokter.php" class="list-group-item">
												<img src="opann.jpg" class="img-circle" alt="Foto Profil" width="60" height="60">'
											.$row["nama_doctor"].'
											<form action="profil-dokter.php" method="post">
												<td><button value="'.$row["id_doctor"].'" name="edit" type="submit" class="btn btn-primary">Buka Profil</button></td>
											</form></a>';
											$count++;
											}}
									?>
	          		</div>

							</div>
							</div>
          </div>
          </section>
      </section>

<?php
	require_once "footer.php";
?>
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

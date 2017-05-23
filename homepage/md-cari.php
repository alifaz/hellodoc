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
                <a class="active" href="meetthedoc.php">
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
								<!search>
								<form  method="post" action="md-cari.php">
									<h5>Cari Spesialisasi</h5>
									<div class="form-group row mt">
										<div class="col-xs-3">
								    	<input type="text" class="form-control" placeholder="Tuliskan spesialisasi dokter..">
										</div>
										<button type="submit" value="Submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari
										</button>
								 	</div>
								</form>



								<! list dokter >

                <div class="list-group">
									<?php
                  $term = mysqli_real_escape_string($conn,$_REQUEST['search']);

                  $sql = "SELECT * FROM doctor WHERE nama_doctor LIKE '%".$term."%'";
                  $r_query = mysqli_query($conn,$sql);

                  $count = 1;
                  while ($data = mysqli_fetch_array($r_query,MYSQLI_ASSOC)){
											echo '<a href="profil-dokter.php" class="list-group-item">
                      <img src="opann.jpg" class="img-circle" alt="Foto Profil" width="60" height="60">
                      '.$data["nama_doctor"].'
											<form action="profil-dokter.php" method="post">
												<button value="'.$data["id_doctor"].'" name="edit" type="submit" class="btn btn-primary">Buka Profil</button>
											</form></a>';
											$count++;
                    }
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

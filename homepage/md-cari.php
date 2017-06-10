<?php
	include "../connect.php";
	require "head-user.php";
	require "header-user.php";


	$username_cek  = $_SESSION['username'];
	$password_cek  = $_SESSION['password'];

	$query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
	$result    = mysqli_fetch_array($query);
	$_SESSION['name'] = $result['name_user'];


?>
<!DOCTYPE html>
<html lang="en">
<title>Meet the Doc!</title>
</header>
</head>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><img src="<?php echo $result['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="60" height="60"></a></p>
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

								<div class="row mt">
									<div class="col-lg-3 col-md-3 col-sm-3">
										<div class="showback">
								<form  method="post" action="md-cari.php">
									<h5>Cari Spesialisasi Dokter</h5>
									<div class="form-group row mt">
										<div class="col-xs-8">
											<input type="text" class="form-control" name="search" placeholder="Cari..">
										</div>
										<button type="submit" value="Submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> Cari
										</button>
									</div>
								</form>
							</div>
						</div>

					<! list dokter >
					<div class="col-lg-9 col-md-9 col-sm-9">
						<div class="showback">
					<div class="row" style="padding-left: 10px;">
						<?php
						$count=1;
  				$term = mysqli_real_escape_string($conn,$_REQUEST['search']);
  			$halaman = 3;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $result = mysqli_query($conn,"SELECT * FROM doctor WHERE specialization LIKE '%".$term."%'  ORDER BY id_doctor ");
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);
    $sql = mysqli_query($conn, "SELECT * FROM doctor WHERE specialization LIKE '%".$term."%'  ORDER BY id_doctor DESC LIMIT $mulai, $halaman");
  	if(mysqli_num_rows($sql) == 0){
    	echo "Not found!";
  	}
		else{
    		while($data = mysqli_fetch_assoc($sql)){
                  $query2 = mysqli_query($conn, "SELECT * FROM user WHERE user_name='$data[username]'");
			 						$result2 = mysqli_fetch_array($query2);
			 							 echo '
			 							 <div class="col-lg-3 col-md-3 col-sm-3 mb weather-2 pn" style="margin: 0px 10px 10px 10px">
			 							 <div class="row centered" style="padding-top: 10px;">
			 							 <img src="'.$result2['photo_user'].'" class="img-circle" alt="Foto Profil" width="120">
			 							 <h4 class="mt"><b>Dr. '.$data["nama_doctor"].'</b></h4>
			 								 <h6>'.$data["specialization"].'</h6>
			 							 <form action="profil-dokter.php" method="post">
			 								 <td><button value="'.$data["id_doctor"].'" name="edit" type="submit" class="btn btn-small btn-primary">Buat konsultasi</button></td>
			 							 </form>
			 						 </div>
			 						 </div>';
			 							 $count++;

              }
            }
            ?>
<!---->
          </div>
      <!-- end: Row -->
      <ul class="pagination">
        <?php for ($i=1; $i<=$pages ; $i++){ ?>
      <li><a href="?halaman=<?php echo $i; ?>&search=<?php echo $term;?>"><?php echo $i; ?></a></li>
      </ul>
  	<?php
			}
			?>

						 </div>
						</div>
					</div>
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

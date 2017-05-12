<!DOCTYPE html>

<html lang="en">
<?php
	require "head-user.php";
	require "togel-down.php";
	include 'konek-user.php';
	  if($_SESSION['status'] == "nouser"){
	    header('Location:login.php');
	  }
	  else{
	      $id = $_SESSION['id'];
	      $query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
	      $result = mysqli_fetch_array($query);
	 ?>
 ?>
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
    								<a href="general.php#" class="btn btn-primary btn-lg active" role="button"><i class="fa fa-user-md" aria-hidden="true"></i> Semua</a>
  								</div>
  								<div class="btn-group">
    								<a href="#" class="btn btn-success btn-lg" role="button"><i class="fa fa-stethoscope" aria-hidden="true"></i> Umum</a>
  								</div>
									<div class="btn-group">
										<a href="dokter-jantung.php" class="btn btn-info btn-lg" role="button"><i class="fa fa-child" aria-hidden="true"></i> Anak</a>
  								</div>
									<div class="btn-group">
										<a href="dokter-jantung.php" class="btn btn-danger btn-lg" role="button"><i class="fa fa-heart" aria-hidden="true"></i> Jantung</a>
  								</div>
									<div class="btn-group">
										<a href="dokter-jantung.php" class="btn btn-warning btn-lg" role="button"><i class="fa fa-deaf" aria-hidden="true"></i> THT</a>
  								</div>
								</div>
								<! list dokter >
								<div class="list-group">
                  <a href="profil-dokter.php" class="list-group-item"><img src="opan.jpg" class="img-circle" alt="Dr. Ghofar" width="60" height="60">	<?php echo $result['name_user']?><br>Spesialis Jantung</a>
                  <a href="#" class="list-group-item"><img src="opann.jpg" class="img-circle" alt="Dr. Opan" width="60" height="60"> Dr.Opan<br>Spesialis Jantung</a>
									<a href="#" class="list-group-item"><img src="opan.jpg" class="img-circle" alt="Dr. Ghofar" width="60" height="60"> Dr. Muhammad<br>Spesialis Anak</a>
	                <a href="#" class="list-group-item"><img src="opann.jpg" class="img-circle" alt="Dr. Opan" width="60" height="60"> Dr. Wkwk<br>Spesialis THT</a>
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
<?php
	}
?>

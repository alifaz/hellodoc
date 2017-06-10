<!DOCTYPE html>

<?php
include "../connect.php";
if ($_SESSION['authority']=="Patient"){
  require "head-user.php";
  require "header-user.php";
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
?>

<html lang="en">


<title>Share with the world</title>
  <body>

  <section id="container" >
<!togel>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><img src="<?php echo $result['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="60" height="60"></a></p>
                <h5 class="centered"><?php echo $_SESSION['name']; ?>
              <?php
                if ($_SESSION['authority']=="Patient")
              { ?>
                  <h5 class="centered">Pasien</h5>
              <?php }
              else if($_SESSION['authority']=="Doctor")
              { ?>
                  <h5 class="centered">Dokter</h5>
              <?php }

          if ($_SESSION['authority']=="Patient"){?>
            <li class="mt">
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php
          }
          else if($_SESSION['authority']=="Doctor"){ ?>
            <li class="mt">
                <a href="dashboard-doc.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
          <?php
        }

          if($_SESSION['authority']=="Patient"){ ?>
            <li class="sub-menu">
                <a href="meetthedoc.php">
                  <i class="fa fa-user-md" aria-hidden="true"></i>
                    <span>Meet The Doc!</span>
                </a>
            </li>
          <?php  }?>
          <?php
          if ($_SESSION['authority']=="Patient"){?>
            <li class="sub-menu">
                <a href="consultation.php">
                    <i class="fa fa-comments"></i>
                    <span>Consultation</span>
                </a>
            </li>
            <?php
          }
          else if($_SESSION['authority']=="Doctor"){ ?>
            <li class="sub-menu">
                <a href="consultation-doc.php">
                    <i class="fa fa-comments"></i>
                    <span>Consultation</span>
                </a>
            </li>
          <?php
        }?>


        <li class="sub-menu">
            <a class="active"href="javascript:;" >
                <i class="fa fa-globe"></i>
                <span>Share With The World!</span>
            </a>
            <ul class="sub">
                <li><a  href="thread-new.php">Post A new thread</a></li>
                <li><a  href="thread.php">Forum</a></li>
                <li><a  href="your-thread.php">Your Thread</a></li>
            </ul>
        </li>

          <li class="sub-menu">
              <a  href="javascript:;" >
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
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
<!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Thread</h3>
          	<div class="row mt">
				<div class="col-lg-12">


					<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Your Thread</h4>
									<?php
											$count=1;
											$query1 = mysqli_query($conn, "SELECT * FROM thread WHERE username = '$username_cek' ORDER BY id_thread DESC");
											if(mysqli_num_rows($query1) > 0){
												while($row = mysqli_fetch_assoc($query1)){
												echo
													'<tr>


														<a href="thread-read.php?id='.$row["id_thread"].'" name="id_thread">
														<div class="form-group">

															<td><b>'.$row["judul"].'</b><br></td>
														</div>

														</a>


													</tr>';
													}
											}
									?>

						</div>

				</div>
          	</div>

		</section>

		<! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
			<footer class="site-footer">
          <div class="text-center">
              2017. Hello, Doc!
              <a href="profile.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
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

<!DOCTYPE html>

<?php
  include "../connect.php";
  if ($_SESSION['authority']=="Patient")
{
  require_once "head-user.php";
	require_once "header-user.php";
}
else if($_SESSION['authority']=="Doctor")
{
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
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

              <p class="centered"><a href="profil-user.php">
                <img src="<?php echo $result['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="60" height="60"></a></p>
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


        if ($_SESSION['authority']=="Patient"){ ?>
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
              <li><a  href="thread-new.php">Post a new thread</a></li>
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
						<h4 class="mb"><i class="fa fa-angle-right"></i> Post a Thread!</h4>
						<form class="form-horizontal style-form" action="../access/threadprocess.php" method="post">
							<div class="form-group">
								<div class="col-sm-10">
									<textarea style="height:40px" type="text" class="form-control" maxlength="90" placeholder="Judul thread (maksimal 90 karakter)" name="judul"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10">
									<textarea style="height:300px" type="text" class="form-control" placeholder="Isi thread" name="isi"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-theme">Post</button>
								</div>
							</div>
						</form>

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

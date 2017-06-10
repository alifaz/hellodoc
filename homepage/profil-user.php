<!DOCTYPE html>
<html lang="en">
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

		$id_doc = $_GET['id'];

		if($_SESSION['authority']=="Patient"){
		$_SESSION['id_doctor'] = $id_doc;

		$query2     = mysqli_query($conn, "SELECT * FROM doctor WHERE id_doctor = '$id_doc'");
	  $result2    = mysqli_fetch_array($query2);

		$username_doc = $result2['username'];

		$query3 = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_doc'");
		$result3 = mysqli_fetch_array($query3);
	}
		if($_SESSION['authority']=="Doctor"){
			$query2     = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_doc'");
		  $result2    = mysqli_fetch_array($query2);

			$username_doc = $result2['user_name'];

			$query3 = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_doc'");
			$result3 = mysqli_fetch_array($query3);
		}
 ?>
  <body>

  <section id="container" >
		<!togel down>
			<aside>
			<div id="sidebar"  class="nav-collapse ">
			  <ul class="sidebar-menu" id="nav-accordion">
						<p class="centered"><a href="profil-user.php">
							<img src="<?php echo $result['photo_user']?>" class="img-circle" alt="<?php echo $_SESSION['name'] ?>"width="60" height="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['name']; ?></h5><?php
		                if ($_SESSION['authority']=="Patient")
		              { ?>
		                  <h5 class="centered">Pasien</h5>
		              <?php }
		              else if($_SESSION['authority']=="Doctor")
		              { ?>
		                  <h5 class="centered">Dokter</h5>
		              <?php
								} 
									if ($_SESSION['authority']=="Patient"){
										?>
					          <li class="mt">
					              <a href="dashboard.php">
					                  <i class="fa fa-dashboard"></i>
					                  <span>Dashboard</span>
					              </a>
					          </li>
					          <?php
					        }
					        else if($_SESSION['authority']=="Doctor"){
										?>
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
					      } ?>

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
			    <!-- sidebar menu end-->
			</div>
			</aside>

			<!isi dashboard-doc>
      <section id="main-content">
        <section class="wrapper">
      		<div class="row mt">
      			<div class="col-sm-12">
              <div class="showback">
                <div class="sub-head centered" style="color:#114017">
                  <h1>Profil</h1>
                </div>

                <div class="media">
                  <div class="media-left media-middle ">
                      <img src="<?php echo $result3['photo_user']?>" class="img-circle" alt="<?php echo $result3['name_user'] ?>"width="100" height="100"></a>
                    </div>
                  <div class="media-body"><br>
                      <h2 class="media-heading"><?php echo $result3['name_user'] ?></h2>
                  </div>
                </div>
                <div class="goright">
									<a href="#" data-toggle="modal" data-target="#Report-user"><i class="fa fa-warning"></i> Report</a>
								</div>

								<div class="modal fade" id="Report-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                <div class="modal-dialog">
	                  <div class="modal-content">
	                    <div class="modal-header">
	                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                      <h4 class="modal-title" id="myModalLabel">Report Thread</h4>
	                    </div>
	                    <div class="modal-body">
	                      <p>Are you sure want to report?</p>
	                    <div class="modal-footer">
	                      <form action="../access/report-user.php" method="post">
	                        <button value="<?php echo $result3['user_name']; ?>" name="username" type="submit" class="btn btn-primary">Yes</button>
	                      </form>
	                      <button data-dismiss="modal" class="btn btn-danger">No</a>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>


                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Username</label>
                      <div class="col-sm-10"><p class="form-control-static">: <?php echo $result3['user_name'] ?></p></div>
                    <label class="control-label col-sm-2">Email</label>
                      <div class="col-sm-10"><p class="form-control-static">: <?php echo $result3['email_user'] ?></p></div>
                    <label class="control-label col-sm-2">Birth date</label>
                      <div class="col-sm-10"><p class="form-control-static">: <?php echo $result3['birthdate'] ?></p></div>
                    <label class="control-label col-sm-2">Gender</label>
                      <div class="col-sm-10"><p class="form-control-static">: <?php echo $result3['gender'] ?></p></div>
                    <label class="control-label col-sm-2">City</label>
                      <div class="col-sm-10"><p class="form-control-static">: <?php echo $result3['city'] ?></p></div>
                  </div>
                </form>
							</div>
            </div>
      				</div><!-- /showback -->
      			</div>
          </div>

      </section>
      <!--main content end-->

      <!footer start-->
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

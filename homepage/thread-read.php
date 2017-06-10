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
$id_thread = $_GET['id'];
  $_SESSION['id_thread'] = $id_thread;
  $query_thread = mysqli_query($conn, "SELECT * FROM thread WHERE id_thread = '$id_thread'");
  $thread = mysqli_fetch_array($query_thread);
  $isi = $thread['isi'];
  if($thread['authority']==3) $authority="Doctor";
  else $authority="Patient";
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
						<?php if($username_cek==$thread['username'])
						{
						?>
						<tr>
							<h5><i>Ini adalah thread yang Anda buat, Anda bisa mengedit atau menghapusnya.</i><h5>
							<form class="form-horizontal style-form" action="thread-edit.php" method="post">
								<div class="form-group">
									<div class="col-sm-10">
										<td><button type="submit" name="edit" style="float: left" class="btn btn-theme">Edit</button></td>

							</form>
							<form class="form-horizontal style-form" action="../access/thread-deleteprocess.php" method="post">
										<td><button type="submit" name="delete" class="btn btn-danger">Delete</button></td>
									</div>
								</div>
							</form>
						</tr>
						<?php
						}
            if($username_cek!=$thread['username']){
            ?>
            <div class="goright">
              <a href="#" data-toggle="modal" data-target="#Report-thread"><i class="fa fa-warning"></i> Report</a>
            </div>
            <?php } ?>

              <div class="modal fade" id="Report-thread" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Report Thread</h4>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure want to report?</p>
                    <div class="modal-footer">
                      <form action="../access/report-thread.php" method="post">
                        <button value="<?php echo $id_thread; ?>" name="id_thread" type="submit" class="btn btn-primary">Yes</button>
                      </form>
                      <button data-dismiss="modal" class="btn btn-danger">No</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

						<h4 class="mb"><b><?php echo $thread['judul'];?></b></h4>
						<h5 class="mb">Oleh: <b><?php echo $thread['nameuser'];?> (<?php echo $authority?>)</b></h5>
						<div class="isi-read"><?php echo str_replace("\n", "<br />", "$isi");?></div>

					<div class="form-panel">
						<h4 class="mb"><i class="fa fa-angle-right"></i> Komentar</h4>
						<form class="form-horizontal style-form" action="../access/thread-commentprocess.php" method="post">
							<div class="form-group">
								<div class="col-sm-10">
									<textarea style="height:100px" type="text" class="form-control" maxlength="250" placeholder="Komentar (maksimal 250 karakter)" name="komen"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-theme">Kirim</button>
								</div>
							</div>
						</form>


					<?php
						$query1 = mysqli_query($conn, "SELECT * FROM comment WHERE id_thread='$id_thread' ORDER BY id_thread");
							if(mysqli_num_rows($query1) > 0){
								while($row = mysqli_fetch_assoc($query1)){
									if($row['id_thread']==$id_thread){

									$isi=$row['isi'];
									$str=str_replace("\n", "<br />", "$isi");
                  if($row['username']!=$username_cek){
                  echo
										'<tr>
											<div class="form-group">
												<td><b>'.$row["nameuser"].' </b><br></td>
												<td>'.$str.'<br></td>
                        <td>
                        <div class="goleft">
                          <a href="#" data-toggle="modal" data-target="#Report-comment"><i class="fa fa-warning"></i> Report</a>
                        </div>
                        </td>
											</div>
										</tr>

                    <div class="modal fade" id="Report-comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Report Comment</h4>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure want to report this comment?</p>
                          <div class="modal-footer">
                            <form action="../access/report-comment.php?id='.$id_thread.'" method="post">
                              <button value="'.$row['id_komen'].'" name="id_komen" type="submit" class="btn btn-primary">Yes</button>
                            </form>
                            <button data-dismiss="modal" class="btn btn-danger">No</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';

                  }
                  else if($row['username']==$username_cek){
                  echo
										'<tr>
											<div class="form-group">
												<td><b>'.$row["nameuser"].' </b><br></td>
												<td>'.$str.'<br></td>
                        <td>
                        <div class="goleft">
                          <a href="#" data-toggle="modal" data-target="#Delete-comment"><i class="fa fa-trash-o"></i> Delete</a>
                        </div>
                        </td>
											</div>
										</tr>

                    <div class="modal fade" id="Delete-comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Delete Comment</h4>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure want to delete this comment?</p>
                          <div class="modal-footer">
                            <form action="../access/delete-comment.php?id='.$id_thread.'" method="post">
                              <button value="'.$row['id_komen'].'" name="id_komen" type="submit" class="btn btn-primary">Yes</button>
                            </form>
                            <button data-dismiss="modal" class="btn btn-danger">No</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
                  }
								}
							}
						}

					?>
					</div>
										<!--if($username_cek==$row['username']){
											<form class="form-horizontal style-form" action="../access/comment-deleteprocess.php" method="post">

												<div class="col-sm-10">
													<td><button type="submit" name="delete" style="float: left" value="$row['id_komen']" class="btn btn-danger">Delete</button></td>
												</div>

											</form>
										}-->






				</div>
          	</div>

		</section>

		<! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
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

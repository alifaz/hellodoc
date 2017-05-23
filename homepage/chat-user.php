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
							<a  href="javascript:;" >
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
<!tabel konsultasi>
  <section id="container" >
      <section id="main-content">
          <section class="wrapper">
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                      <div class="container">
<div class="row " style="padding-top:40px;">
  <h3 class="centered" >Ruang Konsultasi</h3>
  <br /><br />
  <div class="col-md-12">
      <div class="panel panel-info">
          <div class="panel-heading">
              <h4 class="centered">Opan</h4>
          </div>
          <div class="panel-body">
            <ul class="media-list">
                <li class="media">
                    <div class="media-body">
                      <div class="media">
                          <a class="pull-left" href="#">
                            <img class="media-object img-circle " src="opan.jpg" width="60"/>
                          </a>
                      <div class="media-body" >
                          Assalamualaikum, Dok. Saya sakit perut itu bagaimana ya dok? keroncongan pak dari siang, mohon bantuannya dok terima kasih..
                        <br />
                          <h4 class="text-muted">Opan | 23rd June at 5:00pm</h4>
                        <hr />
                      </div>
                      </div>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-body">
                      <div class="media">
                          <a class="pull-left" href="#">
                            <img class="media-object img-circle " src="opann.jpg" width="60"/>
                          </a>
                          <div class="media-body" >
                          Wah kenapa tuh ya? coba makan dulu pak
                          <br />
                          <h4 class="text-muted">Dr. Bambang | 23rd June at 5:00pm</h4>
                                                  <hr />
                                              </div>
                                          </div>

                                      </div>
                                  </li>
   <li class="media">

                                      <div class="media-body">

                                          <div class="media">
                                              <a class="pull-left" href="#">
                                                  <img class="media-object img-circle " src="opan.jpg" width="60"/>
                                              </a>
                                              <div class="media-body" >
                                                  Oke, bentar pak saya ke warteg dulu..
                                                  <br />
                                                 <h4 class="text-muted">Opan | 23rd June at 5:00pm</h4>
                                                  <hr />
                                              </div>
                                          </div>

                                      </div>
                                  </li>
   <li class="media">

                                      <div class="media-body">

                                          <div class="media">
                                              <a class="pull-left" href="#">
                                                  <img class="media-object img-circle " src="opan.jpg" width="60"/>
                                              </a>
                                              <div class="media-body" >
                                                  Oh iya ilang pak sakitnya, terima kasih. Hello doc sangat membantu ya
                                                  <br />
                                                 <h4 class="text-muted">opan | 23rd June at 5:00pm</h4>
                                                  <hr />
                                              </div>
                                          </div>

                                      </div>
                                  </li>
                              </ul>
          </div>
          <div class="panel-footer">
              <div class="input-group">
                <input id="btn-input" type="text" class="form-control input-lg" maxlength="140" placeholder="Konsultasikan disini..."></br>
                <div class="input-group-btn">
                    <a href="#" class="btn btn-info btn-lg" role="button">Kirim</a>
                </div>
              </div>
          </div>
      </div>
  </div>

                                      </div>
                                  </li>
                              </ul>
              </div>
          </div>

  </div>
</div>
</div>
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

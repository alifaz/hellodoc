<!DOCTYPE html>

<?php
  include "../connect.php";

  $username_cek  = $_SESSION['username'];
  $password_cek  = $_SESSION['password'];

  $query     = mysqli_query($conn, "SELECT * FROM doctor WHERE username = '$username_cek' and password = '$password_cek'");
  $result    = mysqli_fetch_array($query);
  
  $id_thread = $_GET['id'];
  $_SESSION['id_thread'] = $id_thread;
  $query_thread = mysqli_query($conn, "SELECT * FROM thread WHERE id_thread = '$id_thread'");
  $thread = mysqli_fetch_array($query_thread);
  $isi = $thread['isi'];
  if($thread['authority']==3) $authority="Doctor";
  else $authority="Patient";
?>

<html lang="en">
	<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Profile Setting</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />

  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  </head>
  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
			<header class="header black-bg">
							<div class="sidebar-toggle-box">
									<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
							</div>
						<!--logo start-->
						<a href="homepage.php" class="logo"><b>Hello, Doc!</b></a>
						<!--logo end-->
						<div class="top-menu">
							<ul class="nav pull-right top-menu">
										<li><a class="logout" href="../access/logoutuser.php">Log out</a></li>
							</ul>
						</div>
				</header>

      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	<?php 
					if ($_SESSION['authority']=="Patient")
				{ ?>
                   <p class="centered"><a href="profilepatient.php"><img src="opan.jpg" class="img-circle" width="60" height="60"></a></p>
				<?php }
				else if($_SESSION['authority']=="Doctor")
				{ ?>
					<p class="centered"><a href="profiledoctor.php"><img src="opan.jpg" class="img-circle" width="60" height="60"></a></p>
				<?php }
				else if($_SESSION['authority']=="Admin")
				{ ?>
					<p class="centered"><a href="profileadmin.php"><img src="opan.jpg" class="img-circle" width="60" height="60"></a></p>
				<?php } ?>
              	  <h5 class="centered"><?php echo $_SESSION['name']; ?></h5>
				  <h5 class="centered"><?php echo $_SESSION['authority']; ?></h5>

                  <li class="mt">
                      <a href="homepage.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="general.php">
                        <i class="fa fa-user-md" aria-hidden="true"></i>
                          <span>Meet The Doc!</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-comments"></i>
                          <span>Consultation</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-globe"></i>
                          <span>Share With The World!</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Post a Thread</a></li>
                          <li><a  href="login.html">Forum</a></li>
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
						else if ($_SESSION['authority']=="Doctor") 
						{ ?>
							<li><a  href="profiledoctor.php">Profile</a></li>
						<?php }
						else 
						{ ?>
							<li><a  href="profileadmin.php">Profile</a></li>
						<?php } ?>
						<li><a  href="change-pass.php">Password</a></li>
                      </ul>
                  </li>


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
						?>
						<h4 class="mb"><b><?php echo $thread['judul'];?></b></h4>
						<h5 class="mb">Oleh: <b><?php echo $thread['nameuser'];?> (<?php echo $authority?>)</b></h5>
						<div class="isi-read"><?php echo str_replace("\n", "<br />", "$isi");?></div>
						</div>
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
						$query1 = mysqli_query($conn, "SELECT * FROM comment ORDER BY id_thread");
							if(mysqli_num_rows($query1) > 0){
								while($row = mysqli_fetch_assoc($query1)){
									if($row['id_thread']==$id_thread){
										
									$isi=$row['isi'];
									$str=str_replace("\n", "<br />", "$isi");
									echo 
										'<tr>
											<div class="form-group">
												<td><b>'.$row["nameuser"].'</b><br></td>
												<td>'.$str.'<br></td>
											</div>
										</tr>';
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
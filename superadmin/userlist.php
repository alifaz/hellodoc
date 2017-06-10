<!DOCTYPE html>

<?php
	include "../connect.php";
	$email  = $_SESSION['username'];
	$pass  = $_SESSION['password'];

	$query     = mysqli_query($conn, "SELECT * FROM user WHERE email_user = '$email' and password_user = '$pass'");
	$result    = mysqli_fetch_array($query);
	$_SESSION['name'] = $result['name_user'];
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hello, Doc! || Doctor List</title>


    <!-- Bootstrap Core CSS -->
    <link href="../css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
								<img alt="Hello, Doc!" class="pull-left" src="../img/Login/Logo.png" style="margin: 3px;
								margin-left: 80px;" width="90" height="60">
            </div>
            <!-- /.navbar-header -->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu clearfix">
                    <li><a class="logout" href="../access/logout.php" style="background-color:#f45350; color: #fff;
                      border:1px solid; border-radius: 4px; margin: 12px;"><b>Logout</b></a></li>
            	</ul>
            </div>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
											<h4 style="text-align:center">
												<br><?php echo $_SESSION['name']; ?><br>Superadmin
											</h4>

                        <li>
                            <a href="userlist.php"><i class="glyphicon glyphicon-plus"></i>  User List</a>
                        </li>
                        <li>
                            <a href="adminlist.php"><i class="glyphicon glyphicon-plus"></i>  Admin List</a>
                        </li>
												<li>
                            <a href="alldoctorlist.php"><i class="glyphicon glyphicon-plus"></i>  Doctor List</a>
                        </li>
                        <li>
                            <a href="patientlist.php"><i class="glyphicon glyphicon-plus"></i>  Patient List</a>
                        </li>
												<li>
                            <a href="userreportlist.php"><i class="glyphicon glyphicon-plus"></i>  User Report List</a>
                        </li>
												<li>
                            <a href="threadreportlist.php"><i class="glyphicon glyphicon-plus"></i>  Thread Report List</a>
                        </li>
												<li>
                            <a href="commentreportlist.php"><i class="glyphicon glyphicon-plus"></i>  Comment Report List</a>
                        </li>
												<li>
                            <a href="adminregistration.php"><i class="glyphicon glyphicon-plus"></i>  Admin Registration</a>
                        </li>

                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <center><h1 class="page-header">User List</h1></center>
                    </div>

                    <!-- Doctor List -->
                    <div>
                  	<table class="table centered">
                  	<tr>
                  		<th>No</th>
                  		<th>Name</th>
                  		<th>Email</th>
											<th>Password</th>
                  		<th colspan="1">Menu</th>
                  	</tr>
                  <?php
                  	$count = 1;

									//	$query    = mysqli_query($conn, "SELECT * FROM rsAdmin");
									//	$ID_admin = mysqli_fetch_array($query);
									//	$id_admin = $ID_admin['rsid_admin'];
                  $query1 = mysqli_query($conn, "SELECT * FROM user WHERE Authority <> '1'");

					//$query = mysqli_fetch_assoc($query1);
					//echo $query['nama_doctor'];
				//	echo $query['rsid_admin'];
					//echo $id_adminrs;
					//$query=$query['rsid_admin'];
					if(mysqli_num_rows($query1) > 0){
						while($row = mysqli_fetch_assoc($query1)){
							echo
								'<tr>
									<td>'.$count++.'</td>
									<td>'.$row["name_user"].'</td>
									<td>'.$row["email_user"].'</td>
									<td>'.$row["password_user"].'</td>
									<form action="../access/deleteproccessuser.php" method="post">
										<td><button value="'.$row["id_user"].'" name="delete" type="submit" class="btn btn-danger">Delete</button></td>
									</form>
								</tr>';
						}
					}

                  ?>
                  	</table>
                  	</div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../css/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../css/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../css/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

</body>

</html>

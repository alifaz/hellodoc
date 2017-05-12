<!DOCTYPE html>

<?php
	include "../connect.php";
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hello, Doc! || Doctor Registration</title>

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
                    <li><a class="logout" href="index.php" style="background-color:#f45350; color: #fff;
                      border:1px solid; border-radius: 4px; margin: 12px;"><b>Logout</b></a></li>
            	</ul>
            </div>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                				<li>
                          	<a href="admindashboard.php"><i class="fa fa-dashboard fa-fw"></i>   Dashboard</a>
                        </li>
												<li>
                            <a href="doctorlist.php"><i class="glyphicon glyphicon-plus"></i>  Doctor List</a>
                        </li>
												<li>
                            <a href="doctorregistration.php"><i class="glyphicon glyphicon-plus"></i>  Doctor Registration</a>
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
                        <center><h1 class="page-header">Doctor List</h1></center>
                    </div>

                    <!-- Doctor List -->
                    <div style="width: 80%; margin: auto;">
                  	<table class="table centered">
                  	<tr>
                  		<th>No</th>
                  		<th>Name</th>
											<th>Username<th>
                  		<th>Email</th>
											<th>Password</th>
											<th>Unique Code</th>
                      <th>Specialization</th>
                  		<th colspan="2">Menu</th>
                  	</tr>
                  <?php
                  	$count = 1;

                    $query = mysqli_query($conn, "SELECT * FROM doctor");

                  	while($result = mysqli_fetch_assoc($query)){

                  		'<tr>
                  			<td>'.$count++.'</td>
                  			<td>'.$result['nama_doctor'].'</td>
                  			<td>'.$result['username'].'</td>
                  			<td>'.$result['email'].'</td>
												<td>'.$result['password'].'</td>
												<td>'.$result['uniquecode'].'</td>
												<td>'.$result['specialization'].'</td>
                  			<td><a href="edit.php?id='.$result['rsid_admin'].'"><button type="button" class="btn btn-primary">Edit</button></a></td>
                  			<td><a href="deleteproses.php?id='.$result['rsid_admin'].'"><button type="button" class="btn btn-danger">Delete</button></td>
                  		</tr>';
                  	}
                  ?>
                  	</table>
                  	</div>
                    <div class="container-fluid bg-2 text-center">
                        <a href="doctorregistration.php?id='.$result['rsid_admin'].'"><button type="button" class="btn btn-primary">
													<span class="glyphicon glyphicon-pencil"></span>  Register A Doctor, Now!</button></a>
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

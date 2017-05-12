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
                        <center><h1 class="page-header">Doctor Registration</h1></center>
                    </div>

                    <!-- Doctor Form Registration -->
                    <div style="width: 80%; margin: auto;">
                  	<table class="table centered">
											<form id="signupForm" class="form-horizontal" action="../access/inputproccessdoctor.php" method="POST">
												<div class="form-group">
										      <label for="name">Name:</label>
										      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
										    </div>
												<div class="form-group">
										      <label for="graduated">Graduate From:</label>
										      <input type="text" class="form-control" name="graduated" id="graduated" placeholder="Enter University or Institution">
										    </div>
												<div class="form-group">
										      <label for="birthdate">Birth Date:</label>
										      	<input type="text" class="form-control" name="birthdate" id="birthdate" placeholder="YYYY/MM/DD">
												</div>
												<div class="form-group">
										      <label for="gender">Gender:</label>
													<div class="radio">
														<label><input type="radio" name="gender" id="gender">Male</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="gender" id="gender">Female</label>
													</div>
										    </div>
												<div class="form-group">
										      <label for="specialization">Specialization:</label>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Umum</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Spesialisasi Anak</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Spesialisasi Kandungan</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Spesialisasi Bedah Saraf</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Spesialisasi Jantung dan Pembuluh Darah</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Spesialisasi THT</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Spesialisasi Onkologi Radiasi</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Spesialisasi Kulit dan Kelamin</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Spesialisasi Patologi Anatomi</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Spesialisasi Bedah Orthopaedi dan Traumatologi</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="specialization" id="specialization">Spesialisasi Membedah Hatimu</label>
													</div>
										    </div>
												<div class="form-group">
										      <label for="address">Address:</label>
													<textarea class="form-control" rows="5" name="address" id="address"></textarea>
										    </div>
												<div class="form-group">
										      <label for="biograph">Biography:</label>
													<textarea class="form-control" rows="5" name="biograph" id="biograph"></textarea>
										    </div>
												<hr>
												<div class="form-group">
										      <label for="username">Username:</label>
										      <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
										    </div>
												<div class="form-group">
										      <label for="email">Email:</label>
										      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
										    </div>
												<div class="form-group">
										      <label for="psw">Password:</label>
										      <input type="password" class="form-control" name="psw" id="psw" placeholder="Enter Password">
										    </div>
												<div class="form-group">
										      <label for="confirmpsw">Confirm Password:</label>
										      <input type="password" class="form-control" name="confirmpsw" id="confirmpsw" placeholder="Re-Enter Password">
										    </div>
												<div class="form-group">
										      <label for="uniquecode">Unique Code:</label>
										      <input type="password" class="form-control" name="uniquecode" id="uniquecode" placeholder="Enter Unique Code">
										    </div>
										    <div class="checkbox">
										      <label><input type="checkbox" id="agree"> Agree to Our Policy</label>
										    </div>
													<center><button type="submit" class="btn btn-primary" href="doctorregistration.html">
														Submit Form</button></center>
										  </form>

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

		<!-- Form Effect -->
		<script type="text/javascript">
			$.validator.setDefaults( {
				submitHandler: function () {
					alert( "submitted!" );
				}
			} );

			$( document ).ready( function () {
				$( "#signupForm" ).validate( {
					rules: {
						name			: "required"
						graduated	: "required"
						birthdate	:{
							required: true,
							minlength:10,
							maxlength: 10,
						}
						gender 		: "required"
						specialization: "required"
						address : "required"
						biograph: "required"
						username: {
							required: true,
							minlength: 4
						},
						email: {
							required: true,
							email: true
						},
						password: {
							required: true,
							minlength: 4
						},
						confirmpsw: {
							required: true,
							minlength: 4,
							equalTo: "#password"
						},
						uniquecode: {
							required: true,
							minlength: 4
						},
						agree		: "required"
					},
					messages: {
						name: "Please provide your name",
						graduated: "Please provide your University or Institution",
						birthdate	:{
							required: "Please provide your Birthdate",
							minlength:"Your Birthdate must be 10 characters long",
							maxlength: "Your Birthdate must be 10 characters long"
						},
						gender: "Please Choose your gender",
						specialization: "Please Choose your Specialization",
						address: "Please Provide your current address",
						biograph: "Please Provide your Biography to assure your patient later",
						username: {
							required: "Please enter a username",
							minlength: "Your username must consist of at least 4 characters"
						},
						email: "Please enter a valid email address",
						password: {
							required: "Please provide a password",
							minlength: "Your password must be at least 4 characters long"
						},
						confirmpsw: {
							required: "Please provide a password",
							minlength: "Your password must be at least 4 characters long",
							equalTo: "Please enter the same password as above"
						},
						uniquecode: {
							required: "Please provide a password",
							minlength: "Your password must be at least 4 characters long"
						},
						agree: "Please accept our policy"
					},
					errorElement: "em",
					errorPlacement: function ( error, element ) {
						// Add the `help-block` class to the error element
						error.addClass( "help-block" );

						// Add `has-feedback` class to the parent div.form-group
						// in order to add icons to inputs
						element.parents( ".col-sm-5" ).addClass( "has-feedback" );

						if ( element.prop( "type" ) === "checkbox" ) {
							error.insertAfter( element.parent( "label" ) );
						} else {
							error.insertAfter( element );
						}

						// Add the span element, if doesn't exists, and apply the icon classes to it.
						if ( !element.next( "span" )[ 0 ] ) {
							$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
						}
					},
					success: function ( label, element ) {
						// Add the span element, if doesn't exists, and apply the icon classes to it.
						if ( !$( element ).next( "span" )[ 0 ] ) {
							$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
						}
					},
					highlight: function ( element, errorClass, validClass ) {
						$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
						$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
					},
					unhighlight: function ( element, errorClass, validClass ) {
						$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
						$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
					}
				} );
			} );
		</script>

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

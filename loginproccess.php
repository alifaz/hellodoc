<?php
	//session_start();
	include "../connect.php";
	if( !empty($_POST) ) {
	    $errors = array();

	    $username = $_POST['username'];
			$password = false;
	    if(isset($_POST['password'])){
	      $password = $_POST['password'];
	   	}

	    if( empty($username) == true OR empty($password) == true ) {
	        $errors[] = '* Username/Password field is required';
	    }
	    else {
	        // if username exists
	        $sql = "SELECT * FROM users WHERE username = '$username'";
	        $query = $connect->query($sql);
	        if( $query->num_rows > 0 ) {
	            // check username and password
	            $password = md5($password);

	            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	            $query = $connect->query($sql);
	            $result = $query->fetch_array();

	            $connect->close();

	            if($query->num_rows == 1) {
	                $_SESSION['logged_in'] = true;
	                $_SESSION['id_user'] = $result['id_user'];

	                header('location:../index.php');
	                exit();
	            }
	            else {
	                $errors[] = ' * Username/Password combination is incorrect';
	            }
	        }
	        else {
	            $errors[] = ' * Username doesn\'t exists';
	        }
	    }

	}
  $username  = $_POST['username'];
  $email     = $_POST['username'];
  $pass      = md5($_POST['psw']);

  $query1     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username' and password_user = '$pass'");
  $result1    = mysqli_fetch_array($query1);
	$authority1	= $result1['Authority'];

	$query2    = mysqli_query($conn, "SELECT * FROM user WHERE email_user = '$email' and password_user = '$pass'");
	$result2   = mysqli_fetch_array($query2);
	$authority2	= $result2['Authority'];

	if ($authority1){
		if ($authority1==1){$authority="Superadmin";}
		else if ($authority1==2){$authority="Admin";}
		else if ($authority1==3){$authority="Doctor";}
		else if ($authority1==4){$authority="Patient";}
	}

	if ($authority2){
		if ($authority2==1){$authority="Superadmin";}
		else if ($authority2==2){$authority="Admin";}
		else if ($authority2==3){$authority="Doctor";}
		else if ($authority2==4){$authority="Patient";}
	}

	$_SESSION['authority'] = $authority;

	if ($result1 AND $_SESSION['authority'] == "Patient") {
		$_SESSION['username'] = $result1['user_name'];
		$_SESSION['password'] = $result1['password_user'];
		?>
			<script>document.location.href='../homepage/dashboard.php';</script>
		<?php
			}
	else if ($result1 AND $_SESSION['authority'] == "Doctor") {
				$_SESSION['username'] = $result1['user_name'];
				$_SESSION['password'] = $result1['password_user'];
				?>
				<script>document.location.href='../homepage/dashboard-doc.php';</script>
				<?php
					}
	else if ($result2 AND $_SESSION['authority'] == "Patient"){
				$_SESSION['username'] = $result2['user_name'];
				$_SESSION['password'] = $result2['password_user'];
		?>
				<script>document.location.href='../homepage/dashboard.php';</script>
		<?php
			}
	else if ($result2 AND $_SESSION['authority'] == "Doctor") {
				$_SESSION['username'] = $result1['user_name'];
				$_SESSION['password'] = $result1['password_user'];
		?>
				<script>document.location.href='../homepage/dashboard-doc.php';</script>
		<?php
			}
			else
			?>
				<script>document.location.href='../index.php';</script>
		<?php

	mysqli_close($conn);
?>

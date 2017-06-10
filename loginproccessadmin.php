<?php
	include "../connect.php";

	$email = false;
	if(isset($_POST['email'])){
    $email = $_POST['email'];
 	}

//  $email     = $_POST['email'];
	$pass      = md5($_POST['psw']);

	$query    = mysqli_query($conn, "SELECT * FROM user WHERE email_user = '$email' and password_user = '$pass'");
	$result   = mysqli_fetch_array($query);
	$authority	= $result['Authority'];

	if ($authority){

		$_SESSION['status'] = "user";
		if ($authority==1){$authority="Superadmin";}
		else if ($authority==2){$authority="Admin";}
	}

	$_SESSION['authority'] = $authority;

	if ($result AND $_SESSION['authority'] == "Superadmin") {
		$_SESSION['username'] = $result['email_user'];
		$_SESSION['password'] = $result['password_user'];
		?>
		<script>document.location.href='../superadmin/userlist.php';</script>
		<?php
			}
	else if ($result AND $_SESSION['authority'] == "Admin") {
				$query2    = mysqli_query($conn, "SELECT * FROM rsadmin WHERE email_admin = '$email'");
				$result2 = mysqli_fetch_array($query2);
				$_SESSION['id']     = $result2['rsid_admin'];
				$_SESSION['username'] = $result['email_user'];
				$_SESSION['password'] = $result['password_user'];
				?>
				<script>document.location.href='../rsadmin/doctorlist.php';</script>
<?php
	}
	else
	?>
		<script>document.location.href='../admin-rs.index.php';</script>
<?php
	mysqli_close($conn);
?>

<?php
	session_start();
	include "../connect.php";

  $email     = $_POST['email'];
	$pass      = md5($_POST['psw']);

	$query      = mysqli_query($conn, "SELECT * FROM rsadmin WHERE email_admin = '$email' and password_admin = '$pass'");
  $result     = mysqli_fetch_array($query);
	$authority	= $result['Authority'];


	if ($result) {
		$_SESSION['id']     = $result['name_user'];
		$_SESSION['status'] = "user";
?>
		<script>document.location.href='../rsadmin/doctorlist.php';</script>
<?php
	}
	else{
?>
		<script>document.location.href='../admin-rs.index.php';</script>
<?php
	}
	mysqli_close($conn);
?>

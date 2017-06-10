<?php
	session_start();
	include "../connect.php";

  $email        = $_POST['email'];
	$uniquecode   = md5($_POST['uniquecode']);

  $query    = mysqli_query($conn, "SELECT * FROM user WHERE email_user = '$email' and unique_code = '$uniquecode'");
  $result   = mysqli_fetch_array($query);

	if ($result) {
		$_SESSION['id']     = $result['email_admin'];
		$_SESSION['status'] = "User";
?>
		<script>document.location.href='../resetpassword.php';</script>
<?php
	}
	else{
?>
		<script>document.location.href='../index.php';</script>
<?php
	}
	mysqli_close($conn);
?>

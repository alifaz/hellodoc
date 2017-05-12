<?php
	include "../connect.php";

  $username  = $_POST['username'];
  $email     = $_POST['username'];
	$pass      = md5($_POST['psw']);

  $query1    = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username' and password_user = '$pass'");
  $result1   = mysqli_fetch_array($query1);

  $query2    = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' and password_user = '$pass'");
  $result2   = mysqli_fetch_array($query2);

	if ($result1 || $result2 && $otoritas) {
		$_SESSION['id']     = $result1['name_user'];
		$_SESSION['status'] = "User";
?>
		<script>document.location.href='../homepage/dashboard.php';</script>
<?php
	}
	else{
?>
		<script>document.location.href='../index.php';</script>
<?php
	}
	mysqli_close($conn);
?>

<?php
	session_start();
	include "../connect.php";

  $username_cek  = $_SESSION['username'];
  $password_cek  = $_SESSION['password'];

  $query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
  $result    = mysqli_fetch_array($query1);
  
  $username = $result['user_name'];
  $email = $result['email_user'];
  $name = $result['name_user'];
  //$birth = $result['name_user'];
  //$address = $result['name_user'];
  //$biography = $result['name_user'];
	
?>

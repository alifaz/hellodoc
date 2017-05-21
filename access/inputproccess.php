<?php
    include "../connect.php";

    $name       = $_POST['name'];
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $pass       = md5($_POST['psw']);
    $otoritas   = 4;
    $uniquecode = md5($_POST['uniquecode']);
	
	$_SESSION['username'] = $username;
    $_SESSION['password'] = $pass;
	$_SESSION['authority'] = "Patient";

    $sql_buat = "INSERT INTO user(id_user,name_user, user_name,
      email_user, password_user,Authority, unique_code)
      VALUE('','$name','$username','$email','$pass','$otoritas','$uniquecode')";
    if (mysqli_query($conn, $sql_buat)){
?>
    <script>document.location.href='../homepage/homepage.php';</script>

<?php
    }
    else{
?>
    <script>document.location.href='../index.php';</script>

<?php
    }
    mysqli_close($conn);
?>

<?php
    include "../connect.php";

    $name       = $_POST['name'];
    $username   = $_POST['name'];
    $email      = $_POST['email'];
    $pass       = md5($_POST['psw']);
    $otoritas   = 2;
    $uniquecode = md5($_POST['uniquecode']);
	
	$query      = mysqli_query($conn, "SELECT * FROM rsadmin WHERE email_admin = '$email' and password_admin = '$pass'");
    $result     = mysqli_fetch_array($query);
	
	$_SESSION['id']=$result['rsid_admin'];
	$_SESSION['status'] = "user";

    $sql_buat1 = "INSERT INTO user(id_user,name_user, user_name,
      email_user, password_user,Authority, unique_code)
      VALUE('','$name','$username','$email','$pass','$otoritas','$uniquecode')";

    $sql_buat2 = "INSERT INTO rsAdmin(rsid_admin,admin_name, email_admin,
      password_admin, unique_code)
      VALUE('','$name','$email','$pass','$uniquecode')";


    if (mysqli_query($conn, $sql_buat1) && mysqli_query($conn, $sql_buat2)){
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

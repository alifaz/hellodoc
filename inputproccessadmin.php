<?php
    include "../connect.php";
if($_POST) {
    $name       = $_POST['name'];
    $username   = $_POST['name'];
    $email      = $_POST['email'];
    $pass       = md5($_POST['psw']);
    $otoritas   = 2;
    $rsname = $_POST['rsname'];

    $cek_username = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username'");
    $cek = mysqli_fetch_array($cek_username);
    $cek_email = mysqli_query($conn, "SELECT * FROM user WHERE email_user = '$email'");
    $cek2 = mysqli_fetch_array($cek_email);
        if($cek){
  ?>
          <script language="javascript">alert("Maaf, username yang anda masukkan sudah terdaftar");</script>
          <script>document.location.href='../superadmin/adminregistration.php';</script>
  <?php
      }
      else if($cek2){
  ?>
        <script language="javascript">alert("Maaf, email yang anda masukkan sudah terdaftar");</script>
        <script>document.location.href='../superadmin/adminregistration.php';</script>
  <?php
    }
    else{
	$query      = mysqli_query($conn, "SELECT * FROM rsadmin WHERE email_admin = '$email' and password_admin = '$pass'");
    $result     = mysqli_fetch_array($query);

	$_SESSION['id']=$result['rsid_admin'];
	$_SESSION['status'] = "user";

    $sql_buat1 = "INSERT INTO user(id_user,name_user, user_name,
      email_user, password_user,Authority)
      VALUE('','$name','$username','$email','$pass','$otoritas')";

    $sql_buat2 = "INSERT INTO rsadmin(rsid_admin, rsname, admin_name, email_admin,
      password_admin)
      VALUE('','$rsname','$name','$email','$pass')";


    if (mysqli_query($conn, $sql_buat1) && mysqli_query($conn, $sql_buat2)){
?>
    <script>document.location.href='../superadmin/adminlist.php';</script>

<?php
    }
    else{
?>
    <script>document.location.href='../superadmin/adminregistration.php';</script>

<?php
    }
    mysqli_close($conn);
  }
  }
?>

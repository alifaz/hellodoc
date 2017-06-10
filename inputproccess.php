<?php
    include "../connect.php";

if($_POST) {
    $name       = $_POST['name'];
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $pass       = md5($_POST['psw']);
    $otoritas   = 4;
    $uniquecode = md5($_POST['uniquecode']);

  $cek_username = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username'");
  $cek = mysqli_fetch_array($cek_username);
  $cek_email = mysqli_query($conn, "SELECT * FROM user WHERE email_user = '$email'");
  $cek2 = mysqli_fetch_array($cek_email);
      if($cek){
?>
        <script language="javascript">alert("Maaf, username yang anda masukkan sudah terdaftar");</script>
        <script>document.location.href='../index.php';</script>
<?php
    }
    else if($cek2){
?>
      <script language="javascript">alert("Maaf, email yang anda masukkan sudah terdaftar");</script>
      <script>document.location.href='../index.php';</script>
<?php
  }
      else {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $pass;
      	$_SESSION['authority'] = "Patient";
    $sql_buat = "INSERT INTO user(id_user,name_user, user_name,
      email_user, password_user,Authority, unique_code, photo_user)
      VALUE('','$name','$username','$email','$pass','$otoritas','$uniquecode','../img/default.png')";
    if (mysqli_query($conn, $sql_buat)){
?>
      <script language="javascript">alert("Sign up successful!");</script>
      <script>document.location.href='../homepage/dashboard.php';</script>

<?php
    }
    else{
?>
    <script>document.location.href='../index.php';</script>

<?php
    }
    mysqli_close($conn);
  }
}
?>

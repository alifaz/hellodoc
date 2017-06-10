<?php
    include "../connect.php";

if($_POST) {
    $username       = $_POST['username'];
    $email          = $_POST['email'];
    $pass           = md5($_POST['psw']);
    $otoritas       = 3;
    $uniquecode     = md5($_POST['uniquecode']);

    $name           = $_POST['name'];
    $graduated      = $_POST['graduated'];
    $birthdate      = $_POST['birthdate'];
    $gender         = $_POST['gender'];
    $specialization = $_POST['specialization'];
    $address        = $_POST['address'];
    $biograph       = $_POST['biograph'];

    $cek_username = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username'");
    $cek = mysqli_fetch_array($cek_username);
    $cek_email = mysqli_query($conn, "SELECT * FROM user WHERE email_user = '$email'");
    $cek2 = mysqli_fetch_array($cek_email);
        if($cek){
  ?>
          <script language="javascript">alert("Maaf, username yang anda masukkan sudah terdaftar");</script>
          <script>document.location.href='../rsadmin/doctorregistration.php';</script>
  <?php
      }
      else if($cek2){
  ?>
        <script language="javascript">alert("Maaf, email yang anda masukkan sudah terdaftar");</script>
        <script>document.location.href='../rsadmin/doctorregistration.php';</script>
  <?php
    }
    else{
    $id_admin = $_SESSION['id'];

    $sql_buat1 = "INSERT INTO user(id_user, name_user, user_name,
      email_user, password_user, Authority, unique_code, photo_user)
      VALUE('','$name','$username','$email','$pass','$otoritas','$uniquecode', '../img/default.png')";

    $sql_buat2 = "INSERT INTO doctor(id_doctor, rsid_admin, nama_doctor, graduated, birthdate,
      gender, specialization, address, biography, username, email, password, uniquecode)
      VALUE('','$id_admin','$name','$graduated','$birthdate','$gender','$specialization','$address',
        '$biograph','$username','$email','$pass','$uniquecode')";

    $result1 = mysqli_query($conn, $sql_buat1);
    $result2 = mysqli_query($conn, $sql_buat2);

    if ($result1 and $result2){
?>
    <script>document.location.href='../rsadmin/doctorlist.php';</script>

<?php
    }
    else{
?>
    <script>document.location.href='../rsadmin/doctorregistration.php';</script>

<?php
    }
    mysqli_close($conn);
  }
  }
?>

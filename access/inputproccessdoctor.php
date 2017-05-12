<?php
    include "../connect.php";

    // $query      = mysqli_query($conn, "ALTER TABLE doctor ADD CONSTRAINT mendaftar FOREIGN KEY id_doctor
    // REFERENCES rsAdmin(rsid_admin) ON DELETE RESTRICT ON UPDATE RESTRICT");
    // $id_admin   = mysqli_fetch_array($query);

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

    $sql_buat1 = "INSERT INTO user(id_user, name_user, user_name,
      email_user, password_user, Authority, unique_code)
      VALUE('','$name','$username','$email','$pass','$otoritas','$uniquecode')";

    $sql_buat2 = "INSERT INTO doctor(id_doctor, nama_doctor, graduated, birthdate,
      gender, specialization, address, biography, username, email, password, uniquecode)
      VALUE('','$name','$graduated','$birthdate','$gender','$specialization','$address',
        '$biograph','$username','$email','$pass','$uniquecode')";


    if (mysqli_query($conn, $sql_buat1) && mysqli_query($conn, $sql_buat2)){
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
?>

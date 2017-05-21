<?php
    include "../connect.php";

    //mengambil data isian dari textfield yang bersesuaian dan menyimpannya dalam variabel

    $username       = $_POST['username'];
    $email          = $_POST['email'];
    $otoritas       = 3;
    $uniquecode     = $_POST['uniquecode'];

    $name           = $_POST['name'];
    $graduated      = $_POST['graduated'];
    $birthdate      = $_POST['birthdate'];
    $gender         = $_POST['gender'];
    $specialization = $_POST['specialization'];
    $address        = $_POST['address'];
    $biograph       = $_POST['biograph'];

    $query1    = mysqli_query($conn, "SELECT * FROM rsadmin WHERE username = $username");
    $ID_admin  = mysqli_fetch_array($query1);
    echo $ID_admin['rsid_admin'];

    $sql_ganti1 = "UPDATE user SET name_user = '$name', Authority = '$otoritas', unique_code = '$uniquecode'
      WHERE email_user = '$email' )";

    $sql_ganti2 = "UPDATE doctor SET rsid_admin = '$id_admin', nama_doctor = $name', graduated = '$graduated',
      birthdate = '$birthdate', gender = '$gender', specialization = '$specialization', address = '$address',
      biography = '$biograph',  uniquecode = '$uniquecode' WHERE email = '$email' )";


    if (mysqli_query($conn, $sql_ganti1) && mysqli_query($conn, $sql_ganti2)){
?>
    <script>document.location.href='../rsadmin/doctorlist.php';</script>

<?php
    }
    else{
?>
    <script>document.location.href='../rsadmin/adminedit.php';</script>

<?php
    }
    mysqli_close($conn);
?>

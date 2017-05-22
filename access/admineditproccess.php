<?php
    include "../connect.php";

    //mengambil data isian dari textfield yang bersesuaian dan menyimpannya dalam variabel

//    $email = false;
  	// if(isset($_POST['edit'])){
    $email          = $_POST['email2'];

    $cek =0;
    $name           = $_POST['name'];
    $graduated      = $_POST['graduated'];
    $birthdate      = $_POST['birthdate'];
    $gender         = $_POST['gender'];
    $specialization = $_POST['specialization'];
    $address        = $_POST['address'];
    $biograph       = $_POST['biograph'];

    $sql_ganti1 = "UPDATE user SET name_user = '$name' WHERE email_user = '$email'";

    $sql_ganti2 = "UPDATE doctor SET nama_doctor = '$name', graduated = '$graduated',
      birthdate = '$birthdate', gender = '$gender', specialization = '$specialization', address = '$address',
      biography = '$biograph' WHERE email = '$email'";

    if(mysqli_query($conn, $sql_ganti1) == TRUE) {$cek+=1;}
    if(mysqli_query($conn, $sql_ganti2) == TRUE) {$cek+=1;}

    if ($cek == 2){
?>
    <script language="javascript">alert("Register Sukses");</script>
    <script>document.location.href='../rsadmin/doctorlist.php';</script>

<?php
    }
    else{
?>
    <script language="javascript">alert("Register Failed");</script>
    <script>document.location.href='../rsadmin/adminedit.php';</script>

<?php
    }
    mysqli_close($conn);
// }
?>

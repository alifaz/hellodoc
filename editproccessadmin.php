<?php
    include "../connect.php";

    //mengambil data isian dari textfield yang bersesuaian dan menyimpannya dalam variabel

//    $email = false;
  	// if(isset($_POST['edit'])){
    $email          = $_POST['email2'];

    $cek =0;
    $name       = $_POST['name'];
    $rsname     = $_POST['rsname'];

    $sql_ganti1 = "UPDATE user SET name_user = '$name' WHERE email_user = '$email'";

    $sql_ganti2 = "UPDATE rsadmin SET admin_name = '$name', rsname = '$rsname'
      WHERE email_admin = '$email'";

    if(mysqli_query($conn, $sql_ganti1) == TRUE) {$cek+=1;}
    if(mysqli_query($conn, $sql_ganti2) == TRUE) {$cek+=1;}

    if ($cek == 2){
?>
    <script>document.location.href='../superadmin/adminlist.php';</script>

<?php
    }
    else{
?>
    <!-- <script language="javascript">alert("Register Failed");</script>
    <script>document.location.href='../superadmin/adminrsedit.php';</script> -->

<?php
    }
    mysqli_close($conn);
// }
?>

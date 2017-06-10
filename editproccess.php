<?php
    include "../connect.php";

    $email      = $_POST['email'];
    $pass       = md5($_POST['psw']);

    //echo $id.' '.$email.' '.$name.' '.$nim.' '.$jk;

    $sql_ganti = "UPDATE user SET password_user = '$pass' WHERE email_user = '$email'";

    if (mysqli_query($conn, $sql_ganti)){
?>
    <script>document.location.href='../index.php';</script>
<?php
    }
    else{
?>
    <script>document.location.href='../resetpassword.php';</script>

<?php
    }
    mysqli_close($conn);
?>

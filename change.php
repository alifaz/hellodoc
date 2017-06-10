<?php
    include "../connect.php";

    $username    = $_POST['username'];
    $email       = $_POST['email'];
    $pass        = md5($_POST['psw']);
    $newpass     = md5($_POST['newpass']);

    $otoritas = 4;

    $sql_ganti = "UPDATE hellodoc SET password_user = $newpass WHERE user_name = $username";
    if (mysqli_query($conn, $sql_ganti)){
?>
		<script language="javascript">alert("Password Has Been Successfully Change");</script>
    <script>document.location.href='../index.php';</script>

<?php
    }
    else{
?>
    <script language="javascript">alert("Password Failed to Change");</script>
    <script>document.location.href='../index.php';</script>

<?php
    }
    mysqli_close($conn);
?>

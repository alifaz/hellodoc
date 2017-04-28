<?php
    include "../connect.php";

    $name     = $_POST['name_user'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $pass     = md5($_POST['psw']);
    $otoritas = 4;

    $sql_buat = "INSERT INTO user(id_user,name_user, user_name,
      email_user, password_user,Authority)
      VALUE('','$name','$username','$email','$pass','$otoritas')";
    if (mysqli_query($conn, $sql_buat)){
?>
    <script>document.location.href='../homepage/homepage.php';</script>

<?php
    }
    else{
?>
    <script>document.location.href='../index.php';</script>

<?php
    }
    mysqli_close($conn);
?>

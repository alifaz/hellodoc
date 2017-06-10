<?php
    include "../connect.php";
	$username_cek = $_SESSION['username'];
	$password_cek = $_SESSION['password'];

    $name           = $_POST['name'];
      $_SESSION['name']= $name;
    $birthdate      = $_POST['birthdate'];
    $gender         = $_POST['gender'];
	$city           = $_POST['city'];
	$_SESSION['name'] = $name;
    $sql 			= "UPDATE user SET name_user = '$name', birthdate='$birthdate', gender='$gender', city='$city' WHERE user_name = '$username_cek'";
    $sql2 			= "UPDATE comment SET nameuser = '$name' WHERE username = '$username_cek'";
    $sql3 			= "UPDATE thread SET nameuser = '$name' WHERE username = '$username_cek'";

    if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
?>
    <script>document.location.href='../homepage/profilepatient.php';</script>
<?php
    } else{
?>
    <script>document.location.href='../access/profilepatient_edit.php';</script>
<?php
    }
	mysqli_close($conn);
?>

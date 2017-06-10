<?php
    include "../connect.php";
	$username_cek = $_SESSION['username'];
	$password_cek = $_SESSION['password'];

    $name           = $_POST['name'];
    $_SESSION['name']= $name;
    $birthdate      = $_POST['birthdate'];
	$graduated		= $_POST['graduated'];
    $gender         = $_POST['gender'];
	$specialization = $_POST['specialization'];
	$address        = $_POST['address'];
	$biography      = $_POST['biography'];

	// $sql 			   = "UPDATE doctor SET nama_doctor = '$name', birthdate='$birthdate', graduated='$graduated',
  //               gender='$gender', specialization='$specialization',  address='$address', biography='$biography'
  //               WHERE username = '$username_cek'";
  $sql2 			= "UPDATE user SET name_user = '$name', birthdate='$birthdate', graduated='$graduated',
                  gender='$gender' WHERE user_name = 'dokter'";
  // $sql3 			= "UPDATE comment SET nameuser = '$name' WHERE username = '$username_cek'";
  // $sql4 			= "UPDATE thread SET nameuser = '$name' WHERE username = '$username_cek'";
  // mysqli_query($conn, $sql2);
  // mysqli_query($conn, $sql3);
  // mysqli_query($conn, $sql4);
    if(mysqli_query($conn, $sql2)){
?>
    <script>document.location.href='../homepage/profiledoctor.php';</script>
<?php
    } else{
?>
    <script>document.location.href='../homepage/profiledoctor_edit.php';</script>
<?php
    }
	mysqli_close($conn);
?>

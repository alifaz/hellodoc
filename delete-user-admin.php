<?php
  include "../connect.php";

  $username  = $_POST['username'];
  $query= mysqli_query($conn,"SELECT * FROM doctor WHERE username='$username'");
  $result=mysqli_fetch_array($query);
  $id_doctor=$result['id_doctor'];

  $sql_hapus1 = "DELETE FROM user WHERE user_name = '$username'";
  $sql_hapus3 = "DELETE FROM konsultasi WHERE id_doctor = '$id_doctor'";
  $sql_hapus2 = "DELETE FROM doctor WHERE username = '$username'";
  $sql_hapus4 = "DELETE FROM thread WHERE username = '$username'";
  $sql_hapus5 = "DELETE FROM comment WHERE username = '$username'";

  $hapus1     = mysqli_query($conn, $sql_hapus1) or die("error");
  $hapus2     = mysqli_query($conn, $sql_hapus2) or die("error");
  $hapus3     = mysqli_query($conn, $sql_hapus3) or die("error");
  $hapus4     = mysqli_query($conn, $sql_hapus4) or die("error");
  $hapus5     = mysqli_query($conn, $sql_hapus5) or die("error");

  if ($hapus1 or $hapus2){

?>
  <script>document.location.href='../superadmin/userreportlist.php';</script>

<?php
  }
  else{
?>
  <!-- <script language="javascript">alert("Register Failed");</script> -->
  <script>document.location.href='../superadmin/userreportlist.php';</script>

<?php
  }
  mysqli_close($conn);
?>

<?php
  include "../connect.php";

  $id_doctor  = $_POST['delete'];

  $query          = mysqli_query($conn, "SELECT * FROM doctor WHERE id_doctor = '$id_doctor'");
  $doctor         = mysqli_fetch_array($query);
  $email_doctor   = $doctor['email'];

  $sql_hapus1 = "DELETE FROM user WHERE email_user = '$email_doctor'";
  $sql_hapus2 = "DELETE FROM doctor WHERE email = '$email_doctor'";

  $hapus1     = mysqli_query($conn, $sql_hapus1) or die("error");
  $hapus2     = mysqli_query($conn, $sql_hapus2) or die("error");

  if ($hapus1 and $hapus2){

?>
  <script>document.location.href='../superadmin/alldoctorlist.php';</script>

<?php
  }
  else{
?>
  <!-- <script language="javascript">alert("Register Failed");</script> -->
  <script>document.location.href='../superadmin/alldoctorlist.php';</script>

<?php
  }
  mysqli_close($conn);
?>

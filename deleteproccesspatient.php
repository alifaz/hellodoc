<?php
  include "../connect.php";

  $id_patient  = $_POST['delete'];

  $query           = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_patient'");
  $patient         = mysqli_fetch_array($query);
  $email_patient   = $patient['email_user'];

  $sql_hapus1 = "DELETE FROM user WHERE email_user = '$email_patient'";

  $hapus1     = mysqli_query($conn, $sql_hapus1) or die("error");

  if ($hapus1){

?>
  <script>document.location.href='../superadmin/adminlist.php';</script>

<?php
  }
  else{
?>
  <!-- <script language="javascript">alert("Register Failed");</script> -->
  <script>document.location.href='../superadmin/adminlist.php';</script>

<?php
  }
  mysqli_close($conn);
?>

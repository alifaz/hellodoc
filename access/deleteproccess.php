<?php
  include "../connect.php";

  $id_doctor  = $_POST['delete'];
  $query      = mysqli_query($conn, "SELECT * FROM user");
  $id_dokter  = mysqli_fetch_assoc($query);
  $id_ud      = $id_dokter['email_user'];

  $sql_hapus1 = "DELETE FROM doctor WHERE id_doctor = '$id_doctor'";
  $sql_hapus2 = "DELETE FROM user WHERE email_user = '$id_ud'";

  $hapus1     = mysqli_query($conn, $sql_hapus1) or die("error");
  $hapus2     = mysqli_query($conn, $sql_hapus2) or die("error");

  if ($hapus1 and $hapus2){

?>
  <script>document.location.href='../rsadmin/doctorlist.php';</script>

<?php
  }
  else{
?>
  <script>document.location.href='../rsadmin/doctorlist.php';</script>

<?php
  }
  mysqli_close($conn);
?>

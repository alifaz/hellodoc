<?php
  include "../connect.php";

  $id_doctor  = $_POST['delete'];

  $query      = mysqli_query($conn, "SELECT * FROM doctor WHERE id_doctor = '$id_doctor'");
  $dokter  = mysqli_fetch_array($query);
  $email_dokter = $dokter['email'];
  
  $sql_hapus = "DELETE FROM konsultasi WHERE id_doctor = '$id_doctor'";
  $hapus = mysqli_query($conn, $sql_hapus) or die("error");

  $sql_hapus1 = "DELETE FROM doctor WHERE id_doctor = '$id_doctor'";
  $sql_hapus2 = "DELETE FROM user WHERE email_user = '$email_dokter'";

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

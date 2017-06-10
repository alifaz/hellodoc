<?php
  include "../connect.php";

  $id_admin  = $_POST['delete'];

  $query         = mysqli_query($conn, "SELECT * FROM rsadmin WHERE rsid_admin = '$id_admin'");
  $admin         = mysqli_fetch_array($query);
  $email_admin   = $admin['email_admin'];

  $sql_hapus1 = "DELETE FROM user WHERE email_user = '$email_admin'";
  $sql_hapus2 = "DELETE FROM rsadmin WHERE email_admin = '$email_admin'";

  $hapus1     = mysqli_query($conn, $sql_hapus1) or die("error");
  $hapus2     = mysqli_query($conn, $sql_hapus2) or die("error");

  if ($hapus1 and $hapus2){

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

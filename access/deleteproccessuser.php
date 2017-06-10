<?php
  include "../connect.php";

  $id_user  = $_POST['delete'];

  $query        = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
  $user         = mysqli_fetch_array($query);
  $email_user   = $user['email_user'];

  $sql_hapus1 = "DELETE FROM doctor WHERE email = '$email_user'";
  $sql_hapus2 = "DELETE FROM user WHERE email_user = '$email_user'";
  $sql_hapus3 = "DELETE FROM rsadmin WHERE email_admin = '$email_user'";

  $hapus1     = mysqli_query($conn, $sql_hapus1) or die("error");
  $hapus2     = mysqli_query($conn, $sql_hapus2) or die("error");
  $hapus3     = mysqli_query($conn, $sql_hapus3) or die("error");

  if ($hapus1 and $hapus2 || $hapus2 and $hapus3 || $hapus1 and $hapus3 || $hapus1){

?>
  <script>document.location.href='../superadmin/userlist.php';</script>

<?php
  }
  else{
?>
  <!-- <script language="javascript">alert("Register Failed");</script> -->
  <script>document.location.href='../superadmin/userlist.php';</script>

<?php
  }
  mysqli_close($conn);
?>

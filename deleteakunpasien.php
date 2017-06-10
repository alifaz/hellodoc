<?php
  include "../connect.php";

  $username  = $_POST['delete'];

  $hapus1     = mysqli_query($conn, "DELETE FROM user WHERE user_name = '$username'") or die("error");

  if ($hapus1){

?>
  <script>document.location.href='../index.php';</script>

<?php
  }
  else{
?>
  <script>document.location.href='../homepage/profilepatient_edit.php';</script>
<?php
  }
  mysqli_close($conn);
?>

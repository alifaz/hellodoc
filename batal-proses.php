<?php
  include "../connect.php";

  $id_konsultasi = $_POST['id_konsultasi'];

  $sql_hapus = "DELETE FROM konsultasi WHERE id_konsultasi = '$id_konsultasi'";
  $hapus = mysqli_query($conn, $sql_hapus) or die("error");

  if ($hapus){

?>

  <script>document.location.href='../homepage/consultation.php';</script>

<?php
  }
  else{
?>
<script languange="javascript">alert("Konsultasi gagal dihapus.");</script>
  <script>document.location.href='../homepage/consultation.php';</script>

<?php
  }
  mysqli_close($conn);
?>

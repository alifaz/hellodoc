<?php
  include "../connect.php";

  $id_konsultasi = $_POST['id_konsultasi'];
  $terima = "terima";
  $sql_terima = mysqli_query($conn, "UPDATE konsultasi set status='$terima', baca_pasien = '1' WHERE id_konsultasi = '$id_konsultasi'");

  if ($sql_terima){

?>
  <script languange="javascript">alert("Konsultasi diterima.");</script>
  <script>document.location.href='../homepage/consultation-doc.php';</script>

<?php
  }
  else{
?>
<script languange="javascript">alert("Konsultasi gagal dihapus.");</script>
  <script>document.location.href='../homepage/consultation-doc.php';</script>

<?php
  }
  mysqli_close($conn);
?>

<?php
  include "../connect.php";

  $id_konsultasi = $_POST['id_konsultasi'];
  $tolak = "tolak";
  $sql_tolak = mysqli_query($conn, "UPDATE konsultasi set status='$tolak' WHERE id_konsultasi = '$id_konsultasi'");

  if ($sql_tolak){

?>
  <script languange="javascript">alert("Konsultasi ditolak.");</script>
  <script>document.location.href='../homepage/consultation-doc.php';</script>

<?php
  }
  else{
?>
<script languange="javascript">alert("Konsultasi gagal ditolak.");</script>
  <script>document.location.href='../homepage/consultation-doc.php';</script>

<?php
  }
  mysqli_close($conn);
?>

<?php
  include "../connect.php";

  $psn = $_POST['pesan'];
  $id_konsul =  $_SESSION['id_konsultasi'];
  $timestamp = date("Y-m-d H:i");
  $username  = $_SESSION['username'];

  $query1 = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username'");
  $data1 = mysqli_fetch_array($query1);
  $nama = $data1['name_user'];

  $query2 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_konsultasi = '$id_konsul'");
  $data = mysqli_fetch_array($query2);

  $id_doc = $data['id_doctor'];
  $id_pasien = $data['id_user'];

  $sql_pesan = "INSERT INTO pesan(id_pesan, id_konsultasi, username, nama_pengirim, pesan, timestamp)
   VALUE('', '$id_konsul','$username','$nama','$psn','$timestamp')";
  $hasil=mysqli_query($conn, $sql_pesan);

  $sql_baca= "INSERT INTO notifpesan(id_user,id_konsultasi, read_user, read_doc)
  VALUE('$id_pasien','$id_konsul', 1,1)";
  $hasil2=mysqli_query($conn, $sql_baca);

  if($hasil){
?>

  <script>document.location.href='../homepage/pesan.php?id=<?php echo $id_konsul;?>';</script>
<?php
  }

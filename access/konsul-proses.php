<?php
  include "../connect.php";

  $keluhan = $_POST['keluhan'];

  $username_cek  = $_SESSION['username'];
  $password_cek  = $_SESSION['password'];

  $query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
  $result    = mysqli_fetch_array($query);
  $_SESSION['name'] = $result['name_user'];
  $id = $result['id_user'];
  $name_user = $result['name_user'];

  $id_doctor_cek = $_SESSION['id_doctor'];
  $query2 = mysqli_query($conn, "SELECT * FROM doctor WHERE id_doctor = '$id_doctor_cek'");
  $data = mysqli_fetch_array($query2);
  $_SESSION['id_doctor'] = $data['id_doctor'];
  $id_doctor = $data['id_doctor'];
  $nama_doctor = $data['nama_doctor'];

  $sql_konsul = "INSERT INTO konsultasi(id_konsultasi, id_user, id_doctor,name_user,nama_doctor,keluhan,
    status) VALUE('', '$id','$id_doctor','$name_user','$nama_doctor','$keluhan', 'yet')";
  $hasil=mysqli_query($conn, $sql_konsul);

  if($hasil){
?>
  <script languange="javascript">alert("konsultasi sukses!");</script>
  <script>document.location.href='../homepage/consultation.php';</script>
<?php
  }
  else{
?>
    <script languange="javascript">alert("konsultasi gagal!");</script>
    <script>document.location.href='../homepage/profil-dokter.php';</script>
<?php
  }
 ?>

<?php
	include "../connect.php";
	$isi = $_POST['komen'];
	$username = $_SESSION['username'];
	$password  = $_SESSION['password'];
	$id_thread = $_SESSION['id_thread'];
	$query   = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username' and password_user = '$password'");
	$data = mysqli_fetch_array($query);
	$nameuser = $data['name_user'];
	
	if($isi!=null){
	  $sql_komen = "INSERT INTO comment(id_komen, id_thread, username, nameuser, isi) 
		VALUE('', '$id_thread', '$username', '$nameuser', '$isi')";
	  $hasil=mysqli_query($conn, $sql_komen);
	}
	
	if($hasil!=null){
	?>
	  <script languange="javascript">alert("Komentar sukses dibuat!");</script>
	  <script>document.location.href='../homepage/thread-read.php?id=<?php echo $id_thread;?>';</script>
	<?php
	  }
	  else{
	?>
		<script languange="javascript">alert("Komentar gagal dibuat, isi komentar tidak boleh kosong!");</script>
		<script>document.location.href='../homepage/thread-read.php?id=<?php echo $id_thread;?>';</script>
	<?php
	  }
?>
<?php
	include "../connect.php";
	$isi = $_POST['isi'];
	$judul = $_POST['judul'];
	$username = $_SESSION['username'];
	$password  = $_SESSION['password'];
	$query   = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username' and password_user = '$password'");
	$data = mysqli_fetch_array($query);
	$nameuser = $data['name_user'];
	$authority = $data['Authority'];
	
	if($isi!=null and $judul!=null){
	  $sql_thread = "INSERT INTO thread(id_thread, username, nameuser, authority, isi, judul) 
		VALUE('', '$username', '$nameuser', '$authority', '$isi', '$judul')";
	  $hasil=mysqli_query($conn, $sql_thread);
	  $query_max=mysqli_query($conn, "SELECT MAX(id_thread) AS id_max FROM thread");
	  $result=mysqli_fetch_array($query_max);
	  $id=$result['id_max'];
	}
	
	if($hasil!=null){
	?>
	  <script languange="javascript">alert("Thread sukses dibuat!");</script>
	  <script>document.location.href='../homepage/thread-read.php?id=<?php echo $id;?>';</script>
	<?php
	  }
	  else{
	?>
		<script languange="javascript">alert("Thread gagal dibuat, judul atau isi thread tidak boleh kosong!");</script>
		<script>document.location.href='../homepage/thread.php';</script>
	<?php
	  }
?>
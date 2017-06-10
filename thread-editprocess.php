<?php
	include "../connect.php";
	$isi = $_POST['isi'];
	$judul = $_POST['judul'];
	$username = $_SESSION['username'];
	$password  = $_SESSION['password'];
	$id_thread = $_SESSION['id_thread'];
	
	if($isi!=null and $judul!=null){
	  $hasil=mysqli_query($conn, "UPDATE thread 
	  SET isi='$isi', judul='$judul' 
	  WHERE id_thread='$id_thread'");
	}
	
	if($hasil){
	?>
	  <script languange="javascript">alert("Thread sukses diubah!");</script>
	  <script>document.location.href='../homepage/thread-read.php?id=<?php echo $id_thread;?>';</script>
	<?php
	  }
	  else{
	?>
		<script languange="javascript">alert("Thread gagal diubah, judul atau isi thread tidak boleh kosong!");</script>
		<script>document.location.href='../homepage/thread.php';</script>
	<?php
	  }
?>
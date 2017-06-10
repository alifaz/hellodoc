<?php
	include "../connect.php";

	$id_thread = $_POST['id_thread'];

	$sql_hapus = "DELETE FROM thread WHERE id_thread='$id_thread'";
	$hapus     = mysqli_query($conn, $sql_hapus) or die("error");

	$sql_hapus_komen = "DELETE FROM comment WHERE id_thread='$id_thread'";
	$hapus_komen = mysqli_query($conn, $sql_hapus_komen) or die("error");

	if($hapus){
	?>
	  <script languange="javascript">alert("Thread sukses dihapus!");</script>
	  <script>document.location.href='../superadmin/threadreportlist.php';</script>
	<?php
	  }
	  else{
	?>
		<script languange="javascript">alert("Thread gagal diubah, judul atau isi thread tidak boleh kosong!");</script>
		<script>document.location.href='../homepage/thread-read-admin.php?id=<?php echo $id_thread;?>';</script>
	<?php
	  }
?>

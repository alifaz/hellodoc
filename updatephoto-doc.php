<?php
	include "../connect.php";
		$username_cek = $_SESSION['username'];
		$folder = "../images/member";
		$upload = "../images/member";
		$foto_size = $_FILES["photobaru"]["size"];
		$foto_loc = $_FILES["photobaru"]["tmp_name"];
		$foto_name = $_FILES["photobaru"]["name"];
		$info = getimagesize($foto_loc);

		 if(($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)){
		 ?>
		 	<script language="javascript">alert("Format picture doesn't support.");</script>
		 	<script>document.location.href='../homepage/profiledoctor_edit.php';</script>
		 <?php
		 }
		 else{
		if($foto_size < 1000000 ){
			move_uploaded_file($foto_loc, "$upload/$foto_name");
			$hasil = mysqli_query($conn, "UPDATE user SET photo_user='$folder/$foto_name' WHERE user_name ='$username_cek'");

			if ($hasil) {
?>
				<script language="javascript">alert("Photo Change Successful");</script>
				<script>document.location.href='../homepage/profiledoctor.php';</script>
<?php
			}
		}
		else{
?>
			<script language="javascript">alert("Photo size is too large.");</script>
			<script>document.location.href='../homepage/profiledoctor_edit.php';</script>
<?php
		}
	}
?>

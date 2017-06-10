<?php
    include "../connect.php";

    $id_komen = $_POST['id_komen'];
    $id_thread = $_GET['id'];
    $sql = "DELETE FROM comment WHERE id_komen = '$id_komen'";

    if (mysqli_query($conn, $sql)){
?>
    <script>document.location.href='../homepage/thread-read.php?id=<?php echo $id_thread;?>';</script>
<?php
    }
    else{
?>
    <script>document.location.href='../homepage/thread-read.php?id=<?php echo $id_thread;?>';</script>

<?php
    }
    mysqli_close($conn);
?>

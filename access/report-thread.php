<?php
    include "../connect.php";

    $id_thread = $_POST['id_thread'];
    $query = mysqli_query($conn,"SELECT report FROM thread WHERE id_thread='$id_thread'");
    $result = mysqli_fetch_array($query);
    $sum = $result['report'] + 1;
    $sql_ganti = "UPDATE thread SET report = '$sum' WHERE id_thread = '$id_thread'";

    if (mysqli_query($conn, $sql_ganti)){
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

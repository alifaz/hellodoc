<?php
    include "../connect.php";

    $id_komen = $_POST['id_komen'];
    $id_thread = $_GET['id'];
    $query = mysqli_query($conn,"SELECT report FROM comment WHERE id_komen='$id_komen'");
    $result = mysqli_fetch_array($query);
    $sum = $result['report'] + 1;
    $sql_ganti = "UPDATE comment SET report = '$sum' WHERE id_komen = '$id_komen'";

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

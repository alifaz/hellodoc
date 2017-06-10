<?php
    include "../connect.php";

    $id_komen = $_POST['id_komen'];
    $sql = "DELETE FROM comment WHERE id_komen = '$id_komen'";

    if (mysqli_query($conn, $sql)){
?>
    <script>document.location.href='../superadmin/commentreportlist.php';</script>
<?php
    }
    else{
?>
    <script>document.location.href='../superadmin/commentreportlist.php';</script>

<?php
    }
    mysqli_close($conn);
?>

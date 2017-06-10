<?php
    include "../connect.php";

    $username = $_POST['username'];
    $query = mysqli_query($conn,"SELECT report FROM user WHERE user_name='$username'");
    $result = mysqli_fetch_array($query);
    $sum = $result['report'] + 1;
    $sql_ganti = "UPDATE user SET report = '$sum' WHERE user_name = '$username'";

    if (mysqli_query($conn, $sql_ganti)){
?>
    <script>document.location.href='../homepage/consultation.php';</script>
<?php
    }
    else{
?>
    <script>document.location.href='../homepage/consultation.php';</script>

<?php
    }
    mysqli_close($conn);
?>

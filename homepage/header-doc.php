<?php
$username_cek  = $_SESSION['username'];
$password_cek  = $_SESSION['password'];
$query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
$result    = mysqli_fetch_array($query);
$_SESSION['username'] = $result['user_name'];
$username = $_SESSION['username'];

$query1 = mysqli_query($conn, "SELECT * FROM doctor WHERE username = '$username' ");
$result1 = mysqli_fetch_array($query1);
$id_doc = $result1['id_doctor'];
$query5 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_doctor = '$id_doc' and baca = '1'  and status='yet'");
$hitungnotif = mysqli_num_rows($query5);

 ?>
<html>
<header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>Hello, Doc!</b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
          <!--  notification start -->
          <ul class="nav top-menu">
              <!-- settings start -->
              <li class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                      <i class="fa fa-tasks"></i>
                      <span class="badge bg-theme"><?php echo $hitungnotif; ?></span>
                  </a>
                  <ul class="dropdown-menu extended tasks-bar">
                      <div class="notify-arrow notify-arrow-green"></div>
                      <li>
                          <p class="green">
                            You have <?php echo $hitungnotif; ?> notifications</p>
                      </li>

                      <?php
                      $count = 1;
                      $query2 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_doctor = '$id_doc' and baca = '1'  and status='yet'");
                      $query3 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_doctor = '$id_doc' and baca = '1'  and status='yet'");
                      if($result2 = mysqli_fetch_array($query3)){
                        while($result3 = mysqli_fetch_assoc($query2)){
                          echo '
                    <a href="consultation-doc-lihat.php?id='.$result3['id_konsultasi'].'">
                      <li>
                          <div class="task-info">
                            <div class="desc">'.$count++.' New Consultation Request</div>
                            <div>'.$result3['name_user'].'</div>
                          <div>
                      </li>
                    </a>'; }
                    }
                      ?>

                      <li class="external">
                          <a href="consultation-doc-notif.php">See All Notifications</a>
                      </li>
                    </ul>
                  </div>
                    <!--  notification end -->
                    <div class="top-menu">
                      <ul class="nav pull-right top-menu">
                          <li><a class="logout" href="../access/logoutuser.php">Log out</a></li>
                      </ul>
                    </div>

          </header>

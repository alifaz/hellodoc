<?php
$username_cek  = $_SESSION['username'];
$password_cek  = $_SESSION['password'];
$query     = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username_cek' and password_user = '$password_cek'");
$result    = mysqli_fetch_array($query);
$_SESSION['id'] = $result['id_user'];
$id = $_SESSION['id'];

$query1 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_user = '$id' and baca_pasien = '1'  and NOT status='yet'");
$hitungnotif = mysqli_num_rows($query1);

$query5 = mysqli_query($conn, "SELECT ");
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
                      $query2 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_user = '$id' AND baca_pasien = 1 AND NOT status='yet'");
                      $query3 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_user = '$id' AND baca_pasien = 1 AND NOT status='yet'");
                      if($result2 = mysqli_fetch_array($query3)){
                        while($result3 = mysqli_fetch_assoc($query2)){

                          if($result3['status']=='terima'){
                    echo '<a href="consultation-patient-lihat.php?id='.$result3['id_konsultasi'].'">
                      <li>
                          <div class="task-info">
                            <div class="desc">'.$count++.' Consultation accepted</div>
                            <div>'.$result3['nama_doctor'].'</div>
                          <div>
                      </li>
                    </a>';}
                      else if($result3['status']=='tolak'){
                        echo '<a href="consultation-patient-lihat.php?id='.$result3['id_konsultasi'].'">
                          <li>
                              <div class="task-info">
                                <div class="desc">'.$count++.' Consultation rejected</div>
                                <div>'.$result3['nama_doctor'].'</div>
                              <div>
                          </li>
                        </a>
                      '; }
                    }}
                      ?>

                      <li class="external">
                          <a href="consultation-notif.php">See All Notifications</a>
                      </li>
                  </ul>
              </li>
              <!-- settings end -->
              <!-- inbox dropdown start-->
              <!-- <li id="header_inbox_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-theme">5</span>
                  </a>
                  <ul class="dropdown-menu extended inbox">
                      <div class="notify-arrow notify-arrow-green"></div>
                      <li>
                          <p class="green">You have 5 new messages</p>
                      </li>

                      <?php
                    //   $count = 1;
                    //   $qpesan = mysqli_query($conn, "SELECT * FROM notifpesan WHERE id_user = '$id' AND read_user = 1'");
                    //   $hasil = mysqli_fetch_array($qpesan);
                    //   $idkonsul = $hasil['id_konsultasi'];
                    //
                    //   $qpesan2 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_konsultasi = '$idkonsul' AND baca_pasien = 1");
                    // //  $hasil2 = mysqli_fetch_array($qpesan2);
                    //     $qpesan3 = mysqli_query($conn, "SELECT * FROM konsultasi WHERE id_konsultasi = '$idkonsul' AND baca_pasien = 1");
                    //
                    //   if($hasil2 = mysqli_fetch_array($qpesan3)){
                    //     while($hasil3 = mysqli_fetch_assoc($qpesan2)){
                    //       echo '
                    // <a href="consultation-patient-lihat.php?id='.$hasil3['id_konsultasi'].'">
                    //   <li>
                    //       <div class="task-info">
                    //         <div class="desc">'.$count++.' Consultation accepted</div>
                    //         <div>'.$hasil3['nama_doctor'].'</div>
                    //       <div>
                    //   </li>
                    // </a>'; }
                    // }
                      ?>
                      <li>
                          <a href="index.html#">
                              <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                              <span class="subject">
                              <span class="from">Zac Snider</span>
                              <span class="time">Just now</span>
                              </span>
                              <span class="message">
                                  Hi mate, how is everything?
                              </span>
                          </a>
                      </li>
                      <li>
                          <a href="index.html#">
                              <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                              <span class="subject">
                              <span class="from">Divya Manian</span>
                              <span class="time">40 mins.</span>
                              </span>
                              <span class="message">
                               Hi, I need your help with this.
                              </span>
                          </a>
                      </li>
                      <li>
                          <a href="index.html#">
                              <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                              <span class="subject">
                              <span class="from">Dan Rogers</span>
                              <span class="time">2 hrs.</span>
                              </span>
                              <span class="message">
                                  Love your new Dashboard.
                              </span>
                          </a>
                      </li>
                      <li>
                          <a href="index.html#">
                              <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                              <span class="subject">
                              <span class="from">Dj Sherman</span>
                              <span class="time">4 hrs.</span>
                              </span>
                              <span class="message">
                                  Please, answer asap.
                              </span>
                          </a>
                      </li>
                      <li>
                          <a href="index.html#">See all messages</a>
                      </li>
                  </ul>
              </li>-->
              <!-- inbox dropdown end -->
          </ul>
        </div>
          <!--  notification end -->
          <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="../access/logoutuser.php">Log out</a></li>
            </ul>
          </div>

</header>

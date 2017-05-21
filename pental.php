<?php
include "connect.php";
//  session_start();
  if(!isset($_SESSION['username'])) {
   include_once("Location: ../homepage/dashboard.php");
   exit;
}



?>

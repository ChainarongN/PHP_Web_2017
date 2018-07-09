<?php
  session_start();
  include 'connectdb.php';
  if (!empty($_SESSION['permis']) ) {
    if (!empty($_POST['proplem'])) {
      $proplemetc = $_POST['proplemetc'];
      $proplem = $_POST['proplem'];
      $date = $_POST['date'];
      $notify = "INSERT INTO `notifacation` (`idNoti`, `proplem`, `proplemEtc`, `statusNotify`, `notiUser`, `Date`)
       VALUES (NULL, '".$proplem."', '".$proplemetc."', '0', '".$_SESSION['permis']."', '".$date."');";
       if ($conn->query($notify) == true) {
         echo '<script>alert("บันทึกการแจ้งซ่อมเรียบร้อย");</script>';
         echo "<script>window.location = ('Main.php');</script>";
       }
    }else {
      echo '<script>alert("กรุณาใส่อาการ");</script>';
      echo "<script>window.location = ('Main.php');</script>";
    }

  }else {
    echo '<script>alert("กรุณาทำการ Login ก่อนใช่บริการ ");</script>';
    echo "<script>window.location = ('Main.php');</script>";
  }
 ?>

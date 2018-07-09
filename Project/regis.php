<?php
include 'connectdb.php';
  $user = $_POST['user'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];
  $fname =  $_POST['fnameregis'];
  $lname = $_POST['lnameregis'];
  $tel = $_POST['tel'];
  $address = $_POST['address'];
  $adduser = "INSERT INTO `member` (`idMember`, `user`, `pass`, `fname`, `lname`, `tel`, `addr`, `statusUser`)
  VALUES (NULL, '".$user."', '".$pass1."', '".$pass2."', '".$fname."', '".$tel."', '".$address."', '2');";
    if (
        empty($user)||
        empty($pass1)||
        empty($pass2)||
        empty($fname)||
        empty($lname)||
        empty($tel)||
        empty($address)
         )
    {
      echo '<script>alert("กรอกขอมูลให้ครบ");</script>';
      echo "<script>window.location = '03_Register.html';</script>";
    }else {
      if ($conn->query($adduser) === TRUE) {
          echo '<script>alert("สมัครเสร็จสิ้น");</script>';
          echo "<script>window.location = '02_Login.html';</script>";
      } else {
        echo '<script>alert("ไม่สามารถทำรายการได้ '. $conn->error. '");</script>';
        echo "<script>window.location = '03_Register.html';</script>";
      }
    }


$conn->close();

?>

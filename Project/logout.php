<?php
  session_start();
  session_destroy();
  echo "<script>alert('ออกจากระบบ');</script>";
  echo "<script>window.location = ('Main.php');</script>";
 ?>

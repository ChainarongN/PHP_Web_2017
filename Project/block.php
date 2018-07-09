<?php

if(!isset($_SESSION))
   {
       session_start();
   }

    include 'connectdb.php';
    if(isset($_SESSION['id_mem'])){
    $sql = "SELECT statusUser FROM member where idMember =". $_SESSION['id_mem'];
    $result = $conn->query($sql);
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($row['statusUser']==0) {

                echo "<script>alert('ไม่มีสิทธิ์ในการเข้าถึงระบบ')
                window.location=('logout.php')</script>";
            }
        }

      }
    $conn->close();
 ?>

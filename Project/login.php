<?php
  session_start();
  include 'connectdb.php';
  $u = $_POST['username'];
  $p = $_POST['password'];
  $login = "SELECT * FROM member WHERE user = '".$u."' AND pass = '".$p."'";
  $check = $conn->query($login);

  if ($check->num_rows > 0) {
    while($row = $check->fetch_assoc()) {
        if ($row['statusUser'] == 1) {
          $_SESSION['permis'] = 'admin';
          $_SESSION['id_mem'] = $row['idMember'];
          header('Location: admin.php');
        // }elseif ($row['statusUser'] == 2) {
        //   header('Location: 01_Main.html');
        }
        else {
          header('Location: Main.php');
          $_SESSION['permis'] = $row['user'];
          $_SESSION['id_mem'] = $row['idMember'];
        }

    }
    //echo "<script>window.location = '01_Main.html';</script>";
  }
   else {
    echo '<script>alert("username or password wrong");</script>';
    echo "<script>window.location = '02_Login.html';</script>";

  }
$conn->close();
?>

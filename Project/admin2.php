<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
  function fn() {
    document.getElementById('fm').submit();
  }
  </script>

    <title></title>
  </head>
  <body>

    <div class="container">
        <h3>Admin</h3>
        <ul class="pagination">
          <li class="active"><a href="admin2.php">จัดการ User</a></li>
          <li ><a href="admin.php" >แจ้งซ้อม</a></li>
          <li ><a href="live_chat_admin.php" >Live Chat</a></li>
          <li ><a href="admin_report.php">Report</a></li>
          <li><a style="background-color:black;color:white;" href="logout.php">Logout</a></li>
          </ul>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="float:right">add user admin</button>


          <div id="demo" class="collapse">
            <form  method="post">
              เพิ่ม :<input type="text" name="" value="" placeholder="Admin" >
              : <input type="text" name="" value="" placeholder="password" >
              <input type="submit" name="" value="ยืนยัน">
            </form>

          </div>

<form class=""  method="post" id="fm">
    <table class="table table-striped">
      <tr>
        <th>No.</th>
        <th>user</th>
        <th>pass</th>
        <th>name</th>
        <th>lastname</th>
        <th>tel</th>
        <th>address</th>
        <th>Status</th>
        <th>จัดการ</th>
      </tr>

    <?php
      session_start();
      include 'connectdb.php';
      $m = "SELECT * FROM `member` WHERE statusUser = 2 or statusUser =0";
      $result = $conn->query($m);
      $c =0;
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".++$c."</td>";
              echo "<td>".$row['user']."</td>";
              echo "<td>".$row['pass']."</td>";
              echo "<td>".$row['fname']."</td>";
              echo "<td>".$row['lname']."</td>";
              echo "<td>".$row['tel']."</td>";
              echo "<td>".$row['addr']."</td>";

                echo "</td>";

                if ($row['statusUser'] == 2) {
                      echo "<td style='color: #69d634;'>ปกติ</td>";
                      echo '<td><button type="submit" class="btn btn-danger" value="'.$row['idMember'].'" name="bt">Block</button><td>';
                }else{
                    echo "<td style='color:#f99494;'>บล็อค</td>";
                      echo '<td><button type="submit" class="btn btn-success" value="'.$row['idMember'].'" name="bt1">UnBlock</button><td>';
                }


              echo "</tr>";

          }
      } else {
          echo "0 การแจ้ง";
      }
      if (isset($_POST['bt'])) {
        $conn->query("UPDATE `member` SET `statusUser` = '0' WHERE `member`.`idMember` = ".$_POST['bt'] );
        echo '<script>alert("บล็อค ID '.$_POST['bt'].'");</script>';
        echo "<script>window.location = 'admin2.php';</script>";
      }
      if (isset($_POST['bt1'])) {
        $conn->query("UPDATE `member` SET `statusUser` = '2' WHERE `member`.`idMember` = ".$_POST['bt1'] );
        echo '<script>alert("ปลดบล็อค ID '.$_POST['bt1'].'");</script>';
        echo "<script>window.location = 'admin2.php';</script>";
      }
    ?>
    </table>
</form>

</div>
<!-- add user admin -->

<!-- Modal -->
<form method="post">
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">เพิ่ม User permis admin</h4>
          </div>
          <div class="modal-body">
            <input type="text" name="adminU" value="" placeholder="Admin" style="width:100%; height:30px; "><br>
            <input type="password" name="adminP" value="" placeholder="password" style="width:100%; height:30px; margin-top:10px;"><br>
            <input type="password" name="adminP2" value="" placeholder="Comfirm password" style="width:100%; height:30px;margin-top:10px; ">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" >ยืนยัน</button>
          </div>
        </div>

      </div>
    </div>

</form>
<?php
if (!empty($_POST['adminU']) && !empty($_POST['adminP']) && !empty($_POST['adminP2'])) {
  $adduser = "INSERT INTO `member` (`idMember`, `user`, `pass`, `fname`, `lname`, `tel`, `addr`, `statusUser`)
  VALUES (NULL, '".$_POST['adminU']."', '".$_POST['adminP']."', '', '', '', '', '1')";
  if ($_POST['adminP'] == $_POST['adminP2']) {
      $conn->query($adduser);
  }else {
      echo "<script>alert('กรอก Password ให้ตรงกัน');</script>";
  }//else


}//if
else {
  if (isset($_POST['adminU']) || isset($_POST['adminP']) || isset($_POST['adminP2'] ) ) {
    echo "<script>alert('กรอกให้ครบ');</script>";
    echo "<script>window.location = 'admin2.php';</script>";

  }//if

}

 ?>

  </body>
</html>

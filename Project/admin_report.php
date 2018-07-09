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

    <div class="container" >
        <h3>Admin</h3>
        <ul class="pagination">
            <li><a href="admin2.php">จัดการ User</a></li>
            <li><a href="admin.php">แจ้งซ้อม</a></li>
            <li ><a href="live_chat_admin.php" >Live Chat</a></li>
            <li class="active"><a href="admin_report.php">Report</a></li>
            <li><a style="background-color:black;color:white;" href="logout.php">Logout</a></li>
          </ul>
<form class=""  method="post" id="fm">


    <table class="table table-striped">



      <tr>
        <th>ID</th>
        <th>ปัญหา</th>
        <th>ปัญหาอื่นๆ</th>
        <th>อุปกรณ์ที่ซ่อม</th>
        <th>วันที่ซ่อม</th>
        <th>ผู้แจ้งซ่อม</th>
        <th>ผู้ซ่อม</th>
      </tr>

    <?php
      session_start();
      include 'connectdb.php';
      $ch = "SELECT * FROM `notifacation`";
      $result = $conn->query($ch);
      $c = 0;
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".++$c."</td>";
              echo "<td>".$row['proplem']."</td>";
              echo "<td>".$row['proplemEtc']."</td>";



                echo "</td>";

              echo "<td>".$row['equipment']."</td>";
              echo "<td>".$row['Date_repair']."</td>";
              echo "<td>".$row['notiUser']."</td>";
              echo "<td>".$row['Repairman']."</td>";
              echo "</tr>";
          }
      } else {
          echo "0 การแจ้ง";
      }
    ?>
    </table>
</form>

<form  method="post">
<div class="container" style="text-align:center;">

    <?php
      if(isset($_GET['id'])){
        $ch = "SELECT * FROM `notifacation` WHERE idNoti = ".$_GET['id'];
        $result = $conn->query($ch);
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row['statusNotify'] == 0){
                  echo "<h3>ID ".$row['idNoti']." ผู้แจ้งซ่อม ".$row['notiUser']."<h3> ";
                  echo '<select  name="sn" class="form-control">
                          <option value="0">กำลังดำเนินการ</option>
                          <option value="1">ดำเนินการเสร็จสิ้น</option>
                          <option value="2">ไม่สามารถซ่อมได้</option>
                  </select>';
                  echo '<button name="button" class="btn btn-primary">ยืนยัน</button>';
                }else {
                  echo "<h3>ID ".$row['idNoti']." ผู้แจ้งซ่อม ".$row['notiUser']."<h3> ";
                  echo '<select  name="sn" class="form-control">
                          <option value="1">ดำเนินการเสร็จสิ้น</option>
                          <option value="2">ไม่สามารถซ่อมได้</option>
                          <option value="0">กำลังดำเนินการ</option>
                  </select>';
                  echo '<button  name="button" class="btn btn-primary">ยืนยัน</button>';
                }
            }
      }
      if (isset($_POST['sn'])) {
          $edit = "UPDATE `notifacation` SET `statusNotify` = ".$_POST['sn']." WHERE idNoti = ".$_GET['id'];
          if ($conn->query($edit) == true) {
            echo "<script>alert('เสร็จสิ้น');</script>";
            echo "<script>window.location = 'admin.php';</script>";
          }
      }

        $conn->close();
     ?>
</form>
</div>



    </div>
  </body>
</html>

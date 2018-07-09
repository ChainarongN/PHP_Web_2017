<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
session_start();
include 'connectdb.php';

 ?>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title></title>
    <style media="screen">
      body{
        padding: 30px;
        background-image: url("IMG/Check_status2.jpg");
        background-repeat: no-repeat;
        background-size: 100%;
      }
      h3{
        text-align: center;
        font-weight: bold;
        color: #000099;
      }
      #div1{
        margin: auto;
        background-color: antiquewhite;
        width: 150ch;
        height: 80ch;
        text-align: center;
        padding-top: 5ch;
        background-color: rgba(215, 250, 252,0.4);
        border-radius: 5ch;
        border: solid 2px black;
      }
      table{
        text-align: center;
        margin: auto;
        width: 130ch;
      }
      th{
        padding: 20px;
        color: #992600;
        font-size: 2ch;
        text-align: center;
      }
      td{
        font-size: 2.5ch;
          font-weight: bold;
      }
      #Register {
          font-size: 180%;
          font-family: myfn1;
          /* background-color: black; */
          color: black;
          border-radius: 10%;
      }
    </style>
  </head>
  <body>
    <div id="div1" >
        <h3>Check Repair Status</h3>
        <h3>สถานะการซ่อม</h3><br><br>



          <form class="" method="post">
              <table>
                <tr>
                  <td><a href="Main.php" id="Register"><< Back</a></td>
                </tr>
                <tr>
                  <th>ID Request</th>
                  <th>Proplem</th>
                  <th>Requested Date</th>
                  <th>Repair date</th>
                  <th>Status</th>
                </tr>

          <?php
            if(isset(  $_SESSION['permis'])){
                $ch = "SELECT * FROM notifacation , member WHERE notiUser = user and idMember = ".$_SESSION['id_mem'];
                $result = $conn->query($ch);
                $c = 0;
                          while($row = $result->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>".++$c."</td>";
                              echo "<td>".$row['proplem']."</td>";
                              echo "<td>".$row['Date']."</td>";
                              echo "<td>".$row['Date_repair']."</td>";



                                echo "</td>";

                                if ($row['statusNotify'] == 0) {
                                      echo "<td style='color: #f99494;'>กำลังดำเนินการ</td>";
                                }
                                else if($row['statusNotify'] == 1){
                                    echo "<td style='color: #69d634;'>ดำเนินการเสร็จสิ้น</td>";
                                }else {
                                    echo "<td style='color: #ff0000;'>ไม่สามารถซ่อมได้</td>";
                                }
                          }



}
                ?>
              </table>
          </form>

      </div>
  </body>
</html>

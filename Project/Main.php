<!DOCTYPE html>
<html>
<?php
session_start();
include 'connectdb.php';
include 'block.php';


 ?>
  <head>
    <meta charset="utf-8">
    <title>Main</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="Font/jquery-3.1.1.min.js"></script>
    <style>
      body{
          /*background-color: white;*/
          background-color:rgb(235,237,239);
      }
      #h1{
        font-family: myfn1;
        font-size: 7ch;
        color: red
      }
      th,tr,td{
          /*background-color: black;*/
          /*border: solid 0.5px black;*/
      }
      .th1{
        font-size: 6ch;
        color: red;
        text-align: left;
      }
      @font-face {
          font-family: myfn1;
          src: url(Font/Bangnampueng.ttf);
      }
      @font-face {
          font-family: myfn2;
          src: url(Font/waan-free_regular-italic.ttf);
      }
      @font-face {
          font-family: myfn3;
          src: url(Font/WR_Tish_Kid2.ttf);
      }
      #div1{
        padding: 0.5ch;
        margin: auto;
        text-align: right ;
        height: 8.6ch;
        background-color: black;
      }
      #table{
        width: 199ch;
        font-size: 4ch;
        color: white;
        font-family: myfn2;
        text-align: right;
      }

      #login,#login1,#register{
        font-family: myfn2;
        font-size: 4.5ch;
        width: 12ch;
        height: 7ch;
        color: white;
        background-color: black;
        border: solid 2px white;
        border-radius: 5ch;
      }
      #login:hover{
          color: red;
          cursor: pointer;
      }
      #login1:hover{
          color: red;
          cursor: pointer;
      }
      #register:hover{
          color: red;
          cursor: pointer;
      }
      #meeting{
        color: red;
      }

      .table1{
        text-align: right;
      }
      .table_1{
        color: white;
        font-family: myfn2;
        font-size: 4ch;
        width: 16ch;
        height: 7ch;
        background-color: black;
        border: solid 2px black;
      }
      #table_register{
        text-align: left;
      }
      #img_FB,#img_line{
        height: 4ch;
        width:  4ch;
      }
      #div2{
        background-color: black;
      }
      #table2{
        margin: auto;
        font-family: myfn2;
        font-size: 4ch;
        color: white;
        width: 170ch;
      }
      #table3{
          margin: auto;
          /*border: solid 2px black;*/
          /*text-align: left;*/

      }
      #div3{

          text-align: center;
          /*background-color: black;*/

      }
      #img_1,#img_2,#img_3,#img_4{
          margin: auto;
            width: 180ch;
            height: 50ch;
          border: solid 2px black;
      }
      #img2,#img3,#img4,#img5 {
          width: 44.6ch;
          height: 27ch;

      }
        .a1{
            font-size: 2ch;
        }
        #tr1{

            font-size: 1.6ch;
            text-align: left;
        }
        .table_1:hover{
            color: red;
            cursor: pointer;
        }
        #text_area{
            font-family: myfn3;
            /*font-size: 4ch;*/
            width: 30ch;
            height: 5ch;
        }
        /*#text_area1{*/
            /*display: none;*/
            /*font-family: myfn3;*/
            /*!*font-size: 4ch;*!*/
            /*width: 30ch;*/
            /*height: 5ch;*/
            /*!*color: red;*!*/
            /*background-color: #7d7d7d;*/
        /*}*/
        #div_repair,#div_status{
            font-family: myfn3;
            font-size: 3ch;
            color: white;
            background-color:rgb(0,0,0);
        }
        #div_repair1,#div_status1{
            background-color:rgb(0,0,0);
        }
        #close_repair,#ok_repair,#ok_status,#close_status{
          color: white;
          background-color: black;
          border: solid 2px white;
        }
        .text_repait{
            background-color:rgb(0,0,0);
            border: solid 0.5px wheat;
        }
        .table_status{
            width: 50ch;
        }
    </style>
  </head>
  <body>
    <h1 id="h1">Repair service</h1>

    <div id="div1">
      <table id="table">
        <tr>

          <?php
              if (isset($_SESSION['permis']) ) {

          echo '<td class="table1"><input type="button" value="หน้าแรก" class="table_1" id="home"></td>
          <td><button type="button"  data-toggle="modal" data-target="#myModal_1" class="table_1">ซ่อม</button></td>
          <td><button type="button"  class="table_1" id="check_sta">เช็คสถานะ</button></td>
          <td><button type="button"  class="table_1" id="chat">Live chat</button></td>
          <td><button type="button"  class="table_1" id="edit">แก้ไขข้อมูลส่วนตัว</button></td>';
        }
 ?>

          <td><input type="button" value="เข้าสู่ระบบ" id="login" style="color:red;"></td>
          <td id="table_register"><input type="button" value="สมัครสมาชิก" id="register"></td>

          <?php

            if (isset($_SESSION['permis']) ) {
              echo "<form method='post' action='logout.php'>";
              echo '<td><input type="submit" name="" value="logout" id="login1"></td>';
              echo "</form>";
              echo "<style>
                  #login,#register{
                  display: none;
                  }
                  </style>";

            }
           ?>

        </tr>
      </table>
    </div><br>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="IMG/1.jpg" alt="Los Angeles" id="img_1">
            </div>

            <div class="item">
                <img src="IMG/3.jpg" alt="Chicago" id="img_2">
            </div>

            <div class="item">
                <img src="IMG/4.JPG" alt="New York" id="img_3">
            </div>
            <div class="item">
                <img src="IMG/5.jpg" alt="New York" id="img_4">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><br><br>
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div id="div3">
        <table id="table3">
            <!--<tr style="text-align: center"><img src="IMG/1.jpg" id="img1"></tr><br><br>-->
            <p class="a1">แนะนำวิธีตรวจซ่อมพื้นฐาน</p>
            <p id="p1">การดูอาการผิดปกติหรือเสียของอุปกรณ์คอมพิวเตอร์ต่างๆ จากช่วงผู้ชำนาญการ</p>
            <tr>
                <td><img src="IMG/3.jpg" id="img2"></td>
                <td><img src="IMG/4.JPG" id="img3"></td>
                <td><img src="IMG/5.jpg" id="img4"></td>
                <td><img src="IMG/6.jpg" id="img5"></td>
            </tr>
            <tr>
                <td class="a1">การ์ดจอ Onboard เสียจะทำอย่างไร</td>
                <td class="a1"> เมนบอร์ดมีการ์ดเสียง Onboard ไม่ทำงาน</td>
                <td class="a1">เปิดสวิทซ์แล้วเครื่องไม่ทำงานใดๆ เลยไฟก็ไม่ติด</td>
                <td class="a1">เปิดเครื่องแล้วมีเสียงร้องแต่ไม่ยอมทำงานใด</td>
            </tr>
            <tr id="tr1">
                <td>ปัญหานี้จะแสดงอาการออกมาในลักษณะเปิดเครื่องได้เห็นไฟเข้า <br><br> เครื่องทำงานปกติแต่หน้าจอจะไม่มีภาพอะไรเลย ผู้ใช้หลายคน <br><br> นึกว่าเมนบอร์ดเสีย จึงไปหาซื้อเมนบอร์ดมาเปลี่ยนใหม่ <br><br> ทำให้สูญเสียเงินไปโดยใช่เหตุ
                    สาเหตุ เป็นเพราะระบบแสดงผล <br><br> ของชิปเซ็ตบนเมนบอร์ดเสีย ทำให้ไม่มีภาพปรากฏบนหน้าจอ <br><br>
                    วิธีแก้ ให้ทำการจัมเปอร์บนเมนบอร์ดเป็น Disable หรือกำหนด <br><br> ค่าในไบออสให้เป็น Disable ขึ้นอยู่กับรุ่นของเมนบอร์ด <br><br> แล้วนำการ์ดจอมาติดตั้งลงในสล็อต AGP แทน <br><br> หากเป็นรุ่นที่ไม่มีสล็อต AGP ก็คงต้องหาซื้อ <br><br> การ์ด PCI มาติดตั้งแทน</td>
                <td>ปัญหานี้มีลักษณะคล้ายกับปัญหาการ์ดจอ Onboard แต่ส่วนใหญ่ <br>การ์ดเสียง Onboard ที่มีปัญหาใช้งานไม่ได้
                    - สาเหตุ<br><br>
                    1. ยังไม่ได้กำหนดให้ใช้งานวงจรเสียงได้จากไบออส<br><br>
                    2. ยังไม่ติดตั้งไดรเวอร์สำหรับวงจรเสียงดังกล่าว<br><br>
                    3. อาจเป็นส่วนของวงจรเสียงในชิปเซ็ตเสีย<br><br>
                    - วิธีแก้
                    1. กำหนดค่าในไบออสโดยเลือกหัวข้อ Integrated Peripherals<br><br>
                    2. เลือกหัวข้อ Onboard Hardware Audio และกำหนดค่าเป็น Enabled<br><br>
                    3. Save ค่าไว้และออกจากไบออสบู๊ตเครื่องใหม่<br><br>
                    4. ใช้แผ่นไดรเวอร์เมนบอร์ดติดตั้งไดรเวอร์เสียงลงใน Windows<br><br>
                    5. หากติดตั้งแล้วใช้การไม่ได้แสดงว่าส่วนวงจรเสียงเสีย ให้ Disabled <br><br> ยกเลิกการใช้งานในไบออส แล้วหาซื้อการ์ดเสียงมาติดตั้งใหม่</td>
                <td> ที่ 1 ปลั๊กPower Supply หลวม
                    วิธีแก้ ให้ลองขยับปลั๊ก Power Supply <br><br> ทั้งทางด้านหลังเครื่องคอมพิวเตอร์และที่เต้าเสียบให้แน่น<br><br>
                    - สาเหตุที่ 2 อาจเป็นที่ Power Supply เสีย
                    วิธีแก้ ให้ลองตรวจเช็ค <br><br> ว่ามีไฟฟ้าออกจาก Power Supply ถูกต้องหรือไม่วิธีสังเกต <br><br> ถ้าเป็นสายไฟสีแดงจะมีค่า +5 Volt ถ้าเป็นสายสีเหลืองจะมีค่า<br><br> +12 Volt  หรืออาจสังเกตง่าย ๆ ขั้นต้นว่าเมื่อเปิดสวิทซ์นั้น<br><br>พัดลมที่ติดอยู กับ Power Supply หมุนหรือไม่ และเป็นไปได้<br><br>ที่บางครั้ง Power Supply อาจจะเสียแต่พัดลมยังหมุนอยู่<br><br> เราอาจจะลองนำ Power Supply ตัวอื่นที่ไม่เสีย <br><br>มาลองเปลี่ยนดูก็ได้ ถ้าเสียก็ซื้ออันใหม่มาเปลี่ยน<br><br> เอาแบบวัตต์สูง ๆ ก็จะดี
                    </td>
                <td>- สาเหตุที่ 1 อุปกรณ์บางตัวที่ต่อกับเมนบอร์ดหลวม<br><br>
                    วิธีแก้ ถ้าอุปกรณ์บางตัวที่ต่อกับเมนบอร์ดหลวม <br><br> จะทำให้กระบวนการเช็คค่าเริ่มต้น (POST) ของBIOS <br><br> ฟ้องค่าผิดพลาด ให้เราเปรียบเทียบค่าสัญญาณ Beep Code <br><br> จากคู่มือเมนบอร์ด<br><br>
                    - สาเหตุที่ 2 อุปกรณ์บางตัวที่อยู่บนเมนบอร์ดต่อไม่ถูกต้อง<br><br>
                    วิธีแก้ ส่วนใหญ่มักเกิดกับ RAM ปกติเมื่อเราเปิดเครื่องแล้วมีปัญหา <br><br> ไม่สามารถแสดงภาพออกทางหน้าจอในตอนเริ่มต้นได้ <br><br> Bios จะพยายามแจ้งอาการเสียผ่านทางเสียงร้องออกทางลำโพง <br><br> ที่อยูภายในเครื่องคอมพ์ ให้เราเปรียบเทียบค่าสัญญาณ Beep Code <br><br> จากคู่มือเมนบอร์ด<br><br>
                    </td>
            </tr>
        </table>
    </div>


    <br><br><br><br>
<!-- button -->
  <div id="div2">
    <table id="table2">
         <tr>
           <th class="th1">Repair service</th>
           <th class="th1">ติดต่อเรา</th>
           <th class="th1">ปัญหาที่พบบ่อย</th>
           <th></th>
         </tr>
        <tr>
            <td>ให้บริการซ่อมคอมพิวเตอร์ <br> พร้อมทั้งให้ความช่วยเหลือทางเทคโนโลยี <br>รับประกันการให้บริการ <br>ซ่อมไม่ได้ไม่คิดเงินครับ!</td>
            <td><br>469/539 ม.5<br> ต.แพรกษาใหม่ ถ.แพรกษา<br> อ.เมือง จ.สมุทรปราการ 10280 <br>096-593-2714<br> 5914210004@mutacth.com</td>
            <td>1. หน้าจอฟ้า<br>2. เปิดไม่ติด <br>3. เครื่องช้าผิดปกติ <br>4.เครื่องปิดเอง</td>
            <td><img src="IMG/LINE-PC.png" id="img_line"> Nuengprakasa17 <br><br><img src="IMG/facebook.jpg" id="img_FB"> NGzChainarong</td>
        </tr>
    </table>
  </div>

  <script>
      $(document).ready(function () {
            var check = 1;
            var text  = "";
            var text2 = "";
          $("#home").click(function () {
                  window.location = ('Main.php')
          });
          $("#login").click(function () {
                  window.location = ('02_Login.html');
          });
          $("#register").click(function () {
                  window.location = ('03_Register.html')
          });

          $("#check_sta").click(function(){
                  window.location = ('Check_Stutus.php')
          });

          $("#edit").click(function(){
                window.location = ('edit_profile.php')
          });
          $("#chat").click(function(){
                window.location = ('live_chat_user.php')
          });
      });

  </script>
    <!-- แจ้งซ่อม+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="container" >
        <!-- Trigger the modal with a button -->
        <!--<button type="button"  data-toggle="modal" data-target="#myModal" class="table_1">Open Modal</button>-->
        <!-- Modal -->
        <div class="modal fade" id="myModal_1" role="dialog" >
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body" id="div_repair">

                            <h1 style="color: red">Repair</h1>
                        <form  action="notify.php" method="post">
                              <p>อาการเสีย : <br>
                                  &emsp;&emsp;&emsp;<input class="a1" type="radio" name="proplem" value="เคริ่องเปิดไม่ได้ ไฟไม่เข้า " id="cb1"> เคริ่องเปิดไม่ได้ ไฟไม่เข้า  <br>
                                  &emsp;&emsp;&emsp;<input class="a1" type="radio" name="proplem" value="มีเสียงดังตอนเปิดเครื่อง ดังไม่หยุด" id="cb2"> มีเสียงดังตอนเปิดเครื่อง ดังไม่หยุด<br>
                                  &emsp;&emsp;&emsp;<input class="a1" type="radio" name="proplem" value="เครื่องยังทำงานอยู่ แต่ภาพไม่ขึ้น " id="cb3"> เครื่องยังทำงานอยู่ แต่ภาพไม่ขึ้น<br>
                                  &emsp;&emsp;&emsp;<input class="a1" type="radio" name="proplem" value="บูตเครื่องแล้วไม่เข้าหน้า Windows" id="cb4"> บูตเครื่องแล้วไม่เข้าหน้า Windows<br>
                                  &emsp;&emsp;&emsp;<input class="a1" type="radio" name="proplem" value="เครื่องอืด ไม่เร็ว เปิด/ปิดช้ามาก " id="cb5"> เครื่องอืด ไม่เร็ว เปิด/ปิดช้ามาก<br>
                                  &emsp;&emsp;&emsp;<input class="a1" type="radio" name="proplem" value="มีไวรัส ในเครื่อง" id="cb6"> มีไวรัส ในเครื่อง
                              </p>

                              <p>Meeting Date : <br>
                                  &emsp;&emsp;&emsp;<input id="meeting" type="date" name="date" value="2018-01-13">
                              </p>

                          <table>
                              <tr>
                                  <td>ปัญหาอื่นๆ : </td>
                                  <td><textarea id="text_area" class="text_repait" name="proplemetc"></textarea></td>
                              </tr>
                          </table>
                        </div>
                        <div class="modal-footer" id="div_repair1">
                            <button  class="btn btn-default" id="ok_repair">OK</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="close_repair">Close</button>
                        </div>
                      </form>


                        <!--<textarea id="text_area1" class="text_repait" disabled="disabled"></textarea>-->


                </div>
            </div>
        </div>
    </div>



  </body>
</html>

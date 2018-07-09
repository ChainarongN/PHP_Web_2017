<html>
<?php
session_start();
include 'connectdb.php';
 ?>
<head>
<title>ThaiCreate.Com Tutorials</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<style>

  body{
    	padding: 5ch;
    	background-image: url("IMG/Login.jpeg");
    	background-repeat: no-repeat;
    	background-size: 100%

  }
  textarea{
    background-color: rgba(215, 250, 252,0.8);
    border-radius: 1ch;
    border: solid 2px black;
  }
  #btnGetJson{
		background-color: black;
		color: red;
		/* border-radius: 10%; */
	}
  .chat1{
    text-align: right;
  }
  table{
    margin: auto;
    /* border: solid 2px black; */
  }
  .table1{
    margin-top: -30ch;
    /* width: 10px; */

  }
</style>
</head>
<body>
  <div class="container">
  <h3>Admin</h3>
  <ul class="pagination">
    <li ><a href="admin2.php">จัดการ User</a></li>
    <li ><a href="admin.php" >แจ้งซ้อม</a></li>
    <li class="active"><a href="live_chat_admin.php" >Live Chat</a></li>
    <li ><a href="admin_report.php">Report</a></li>
    <li><a style="background-color:black;color:white;" href="logout.php">Logout</a></li>
    </ul>
<table>
  <tr>
    <td><textarea name="name" rows="30" cols="80" id="textar" disabled></textarea></td>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    <td><table class ="table1">

      <tr>
        <td>All User</td>
        <td></td>
        <td></td>
      </tr>

    <?php
    $selectchatuser = "SELECT * FROM member WHERE statusUser = 2";
    // $sel = "SELECT * FROM chatuser GROUP BY chat_id_member";
    $query = mysqli_query($conn,$selectchatuser);
    // $query1 = mysqli_query($conn,$sel);
    while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
        echo "<tr>";
        // all user
        echo '<td><button
              id="'.$result['idMember'].$result['idMember'].'"
              style= "width: 10ch;"
              type="button"
              value="'.$result['idMember'].'">'.$result['user'].'</button></td>';
        echo " </tr>";
    }
    ?>
  </table>
</td>
  <td>
    <table class ="table1">
        <tr>
          <td>Notifications</td>
        </tr>
<?php
        $sel = "SELECT * FROM chatadmin , member WHERE  chat_status = 1 and idMember = chat_memberid GROUP BY chat_memberid ;";
        $query1 = mysqli_query($conn,$sel);

        while($result = mysqli_fetch_array($query1,MYSQLI_ASSOC)) {
          echo "<tr>";
          // noti
        // echo "<td><input type='button' name='button' value='".$result['user']."' style='width: 10ch;color:red;'></td>";
          echo '<td><button
                id="'.$result['idMember'].'"
                style= "width: 10ch;color:red;"
                type="button"
                value="'.$result['idMember'].'">'.$result['user'].'</button></td>';
          echo " </tr>";
        }
  ?>

<!-- <button style= "width: 10ch;color:red;" type="button" name="button" value="'.$result['idMember'].'">'.$result['user'].'</button> -->
  </table>
</td>
  </tr>
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <tr>
    <td class="chat1"><input type="text" name="" value="" id="insertuser" placeholder="Message">
      <!-- <button id="btnGetJson"  type="button" name="button">Get Json</button> -->
    <input type="button" name="btnGetJson" id="btnGetJson" value="Get Json">

    </td>
  </tr>
</table>

<div id="content"></div>
<script type="text/javascript">
    // function getidbutton(clicked_id){
    //
    //   return clicked_id;
    // }

		$(document).ready(function() {
      var inserttext;
      setInterval( function() { getChatText(); }, 2000);
      var lasttimeID = 0;
      function getChatText() {
        $.ajax({
           type: "POST",
           url: "live_chat_admin_DB.php",
           data: {
             action: "getID"
           },
           dataType: 'json',
           success: function(result) {
             // $('#textar').html(result.admin);
              // console.log(result.id);

              if(lasttimeID != result.id) {
                lasttimeID = result.id;
                if(inserttext != undefined) updateChatText();
              }
               // $('#textar').html(result.userchat);
               // $('#textar').html(result.content);
           }
         });// end readchat
      }

      function updateChatText() {
        $.ajax({
           type: "POST",
           url: "live_chat_admin_DB.php",
           data: {
             action: "readChat",
             senduserid: inserttext
           },
           dataType: 'json',
           success: function(result) {
             // $('#textar').html(result.admin);
              $('#textar').html(result.admin);
              var mydiv = $("#textar");
              mydiv.scrollTop(mydiv.prop("scrollHeight"));
               // $('#textar').html(result.userchat);
               // $('#textar').html(result.content);
           }
         });// end readchat
      }

      $("button").click(function(){
         // alert($(this).val());
         inserttext = $(this).val();
         $("button#"+inserttext).remove();


         // if (inserttext+inserttext == $(this).val()) {
         //      $(this).remove();
         // }else {
         //   $(this).attr('value',inserttext);
         // }

        // readChat ครั้งแรก
         $.ajax({
            type: "POST",
            url: "live_chat_admin_DB.php",
            data: {
              action: "readChat",
              senduserid: inserttext
            },
            dataType: 'json',
            success: function(result) {
              // $('#textar').html(result.admin);
               $('#textar').html(result.admin);
                // $('#textar').html(result.userchat);
                // $('#textar').html(result.content);
            }
          });// end readchat
      });// end button click

      // insert

      $("#btnGetJson").click(function() {
          $.ajax({
             type: "POST",
             url: "live_chat_admin_DB.php",
             data: {
               action: 'writeChat_admin',
               senduserid: inserttext, // ตอนกดปุ่มจะได้ value ID
               data: $("#insertuser").val()
             },
             dataType: 'json',
             success: function(result) {
               // $('#textar').html(result.admin);
                $('#textar').html(result.admin);

                var mydiv = $("#textar");
                mydiv.scrollTop(mydiv.prop("scrollHeight"));
                $("#insertuser").val(" ");
             }
           });
         });
           // var $textarea = $('#textar');
           // $textarea.scrollTop($textarea[0].scrollHeight);

      // });

// read เมื่อมีการ insert

      // enter
      $("#insertuser").on("keypress",function (e) {
                if (e.keyCode == 13) {
                      $.ajax({
                         type: "POST",
                         url: "live_chat_admin_DB.php",
                         data: {
                           action: 'writeChat_admin',
                           data: $("#insertuser").val(),
                           senduserid: inserttext
                         },
                         dataType: 'json',
                         success: function(result) {
                           // $('#textar').html(result.admin);
                           $('#textar').html(result.admin);

                           var mydiv = $("#textar");
                           mydiv.scrollTop(mydiv.prop("scrollHeight"));
                          $("#insertuser").val(" ");
                          // $('#textar').html(result.content);
                         }
                       });
                }//if
            }); // end enter
		});
</script>
<!-- <script type='text/javascript' src='alluser.js'></script> -->
</div>
</body>
</html>

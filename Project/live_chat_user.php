<html>
<?php
session_start();
include 'block.php';
 ?>
<head>
<title>ThaiCreate.Com Tutorials</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<style media="screen">
body{
	padding: 5ch;
	background-image: url("IMG/Register.jpg");
	background-repeat: no-repeat;
	background-size: 100%

}
	table{
		text-align: right;
		margin: auto;
	}
	div{
		text-align: center;
	}
	h1{
		text-align: center;
		color: red;
	}
	textarea{
		background-color: rgba(215, 250, 252,0.8);
		border-radius: 1ch;
		border: solid 2px black;
	}
  a{
    font-size: 5ch;
    color: red;
  }
	#btnGetJson{
		background-color: black;
		color: red;
		/* border-radius: 10%; */
	}
</style>
</head>
<body>
	<!-- <div class=""> -->
<p><a href="Main.php"> << Back</a>
</p>
<h1>Live Chat</h1>
<table>
	<tr>
		<td><textarea name="name" rows="30" cols="80" id="textar" disabled></textarea></td>
	</tr>
	<tr>
		<td>
			<input type="text" name="" value="" id="insertuser" placeholder="Message">
			<input type="button" name="btnGetJson" id="btnGetJson" value="Get Json">
		</td>
	</tr>
</table>

<!-- </div> -->


<script type="text/javascript">
		$(document).ready(function() {

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
								updateChatText();
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
             senduserid: <?=$_SESSION['id_mem'] ?>
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

      $.ajax({
         type: "POST",
         url: "live_chat_admin_DB.php",
         data: {
           action: "readChat",
					 senduserid:<?=$_SESSION['id_mem'] ?>
         },
         dataType: 'json',
         success: function(result) {
           // $('#textar').html(result.userchat+result.admin);
					 $('#textar').html(result.admin);
         }
       });
			$("#btnGetJson").click(function() {

					$.ajax({
					   type: "POST",
					   url: "live_chat_admin_DB.php",
					   data: {
               action: 'writeChat_user',
               data1: $("#insertuser").val()
             },
             dataType: 'json',
					   success: function(result) {
							 // $('#textar').html(result.userchat+result.admin);
							 $('#textar').html(result.admin);
							 var mydiv = $("#textar");
							 mydiv.scrollTop(mydiv.prop("scrollHeight"));
							 $("#insertuser").val(" ");
					   }
					 });

           // $textarea.scrollTop($textarea[0].scrollHeight);

			});

      $("#insertuser").on("keypress",function (e) {
                if (e.keyCode == 13) {
                      $.ajax({
                         type: "POST",
                         url: "live_chat_admin_DB.php",
                         data: {
                           action: 'writeChat_user',
                           data1: $("#insertuser").val()
                         },
                         dataType: 'json',
                         success: function(result) {
                           // $('#textar').html(result.userchat+result.admin);
													 $('#textar').html(result.admin);

													 var mydiv = $("#textar");
					                 mydiv.scrollTop(mydiv.prop("scrollHeight"));
					                 $("#insertuser").val(" ");
                         }
                       });

                }
            });
		});
</script>
<script src="alluser.js"></script>
</body>
</html>

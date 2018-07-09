
      $("button").click(function(){
         // alert($(this).val());
         inserttext = $(this).val();
        
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

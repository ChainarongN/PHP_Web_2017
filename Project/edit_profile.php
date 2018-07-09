<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
// if(!isset($_SESSION))
   // {
       session_start();
   // }


include 'connectdb.php';
// include 'block.php';


 ?>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="Font/jquery-3.1.1.min.js"></script>
    <style>
        @font-face {
            font-family: myfn1;
            src: url(Font/Bangnampueng.ttf);
        }
        body {
            padding-top: 27ch;
            background-image: url("IMG/Login.jpeg");
            background-repeat: no-repeat;
            background-size: 200ch
        }
        #div1 {
            margin: auto;
            background-color: antiquewhite;
            width: 50ch;
            height: 40ch;
            text-align: center;
            padding-top: 5ch;
            background-color: rgba(215, 250, 252,0.4);
            border-radius: 5ch;
            border: solid 2px black;
        }
        #frist, #last ,#c_password,#Password{
            font-size: 3.5ch;
            font-family: myfn1;
            border: solid 2px black;
            color: darkgoldenrod;
            background-color: 	rgba(255, 242, 204,0.3)
        }
        #edit, #close {
            font-size: 200%;
            font-family: myfn1;
            background-color: black;
            color: white;
            border-radius: 10%;
        }
        table{
          margin: auto;
          width: 45ch;
        }
    </style>
  </head>
  <body>
    <form action="" method="post">

<?php
      $ch = "SELECT * FROM member WHERE idMember = ".$_SESSION['id_mem'];
      $result = $conn->query($ch);

    while($row = $result->fetch_assoc()) {

?>

        <div id="div1">
          <table>
            <tr>
              <td><p>Fristname</p></td>
              <td><input type="text" id="frist" name="fristname" placeholder="Fristname" value="<?=$row['fname'] ?>"class="a1"></td>
            </tr>
            <tr>
                <td><p>Lastname</p></td>
              <td><input type="text" id="last" name="Lastname" placeholder="Lastname" class="a1" value="<?=$row['lname'] ?>"></td>
            </tr>
            <tr>
                <td><p>Password</p></td>
              <td><input type="password" id="Password" name="Password" placeholder="Password" class="a1"></td>
            </tr>
            <tr>
              <td><p>Confirm Password</p></td>
              <td><input type="password" id="c_password" name="c_password" placeholder="Confirm Password" class="a1"></td>
            </tr>
          </table>

            <p id="p2"></p>
            <input type="submit" id="edit" value="Edit" >
            <input type="button" id="close" value="Close">
            <p id="p1"></p>
        </div>
        <script>
        $(document).ready(function () {
            $("#close").click(function () {
                    window.location = ('Main.php')
            });
        });
        </script>
<?php }


        if (!empty($_POST['fristname']) &&
            !empty($_POST['Lastname']) &&
            !empty($_POST['Password']) &&
            !empty($_POST['c_password']) )
            {

          $pass = $_POST['Password'];
          $pass1 = $_POST['c_password'];
          $fname = $_POST['fristname'];
          $lname = $_POST['Lastname'];

          if ($pass == $pass1) {
            $update = "UPDATE member SET fname = '".$fname."' , lname = '".$lname."' , pass = '".$pass."' WHERE idMember = ".$_SESSION['id_mem'];
            $result = $conn->query($update);
            echo "<script>alert('เสร็จสิ้น')</script>";
            echo "<script>window.location = ('Main.php')</script>";

          }
          else {
              echo "<script>alert('Password ไม่ตรงกัน')</script>";
          }

        }
?>



    </form>

  </body>
</html>

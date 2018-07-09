<?php
session_start();
	header('Content-Type: application/json');

  $conn = new mysqli('localhost', 'root', '', 'project_repair');
  mysqli_set_charset($conn,"utf8");


	if(isset($_POST['action']) && $_POST['action'] == "getID") {
    $resultArray['id'] = "";
		$time = 0;
		$read_id = "SELECT idchatadmin FROM chatadmin ORDER BY idchatadmin DESC LIMIT 1";
		$query = mysqli_query($conn,$read_id);
		$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$resultArray['id'] = $result['idchatadmin'];
	}




 // Read_Chat admin..
  if(isset($_POST['action']) && $_POST['action'] == "readChat") {
    $resultArray['admin'] = "";
		// $resultArray['userchat'] = "";
		$selectchatadmin = "SELECT * FROM chatadmin
		WHERE chat_memberid = ".$_POST['senduserid'];

    $query = mysqli_query($conn,$selectchatadmin);
    while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
			if($result['textchatadmin'] == ""){
					$resultArray['admin'] .= sprintf("
					user:%s
					time:%s
					",$result['textchatuser'],$result['dt_admin']);
			}else{
					$resultArray['admin'] .= sprintf("
					admin:%s
					time:%s
					",$result['textchatadmin'],$result['dt_admin']);
			}

    } // ..admin
  } //if
	 // INSENT Admin
	else if(isset($_POST['action']) && $_POST['action'] == "writeChat_admin") {
		$resultArray['admin'] = "";
		// $resultArray['userchat'] = "";

		$insertchat = sprintf("INSERT INTO chatadmin (idchatadmin, textchatadmin, chat_memberid, dt_admin,textchatuser, chat_status)
									VALUES (NULL, '%s', %d, Now(), '', 1)",$_POST['data'],$_POST['senduserid']);
		$query = mysqli_query($conn,$insertchat);
		$query_update = "UPDATE chatadmin SET chat_status=0 WHERE chat_memberid = ".$_POST['senduserid'];
		mysqli_query($conn,$query_update);

		// $selectchatadmin = "SELECT * FROM chatadmin WHERE chat_memberid = ".$_POST['senduserid'];
		$selectchatadmin = "SELECT * FROM chatadmin
		WHERE chat_memberid = ".$_POST['senduserid'];

    $query = mysqli_query($conn,$selectchatadmin);
    while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
			if($result['textchatadmin'] == ""){
					$resultArray['admin'] .= sprintf("
					user:%s
					time:%s
					",$result['textchatuser'],$result['dt_admin']);
			}else{
					$resultArray['admin'] .= sprintf("
					admin:%s
					time:%s
					",$result['textchatadmin'],$result['dt_admin']);
			}
    }

} // end  INSENT Admin
  // INSENT User
	else if(isset($_POST['action']) && $_POST['action'] == "writeChat_user") {
    $resultArray['admin'] = "";
		// $resultArray['userchat'] = "";
    $insertchat = sprintf("INSERT INTO chatadmin (idchatadmin, textchatadmin, chat_memberid, dt_admin,textchatuser,chat_status)
                  VALUES (NULL, '', '%d', Now(),'%s',1)",$_SESSION['id_mem'],$_POST['data1']);
    $query = mysqli_query($conn,$insertchat);

					$selectchatadmin = "SELECT * FROM chatadmin
					WHERE chat_memberid = ".$_SESSION['id_mem'];

					$query = mysqli_query($conn,$selectchatadmin);
						while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
							if($result['textchatadmin'] == ""){
									$resultArray['admin'] .= sprintf("
					user:%s
					time:%s
									",$result['textchatuser'],$result['dt_admin']);
							}else{
									$resultArray['admin'] .= sprintf("
					admin:%s
					time:%s
									",$result['textchatadmin'],$result['dt_admin']);
							}
						}
  }// end INSENT User


	mysqli_close($conn);
	echo json_encode($resultArray);
?>

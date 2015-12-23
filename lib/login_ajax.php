<?
	require_once "dbconn.php";

	$id = ($_POST[id]);	
	$pw = ($_POST[pw]);

	$sql = "select * from member where id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$db_id = $row[id];
	$db_pass = $row[pass];
	$db_name = $row[name];

	if($db_id != $id){
		$arg = array(array(
			"confirm" => "no",
			"reason" => "noid"
			));
		$result = json_encode($arg);
		echo $result;
		exit;
	} else {
		if ($db_pass != $pw) {
			$arg = array(array(
				"confirm" => "no",
				"reason" => "nopw"
				));
			$result = json_encode($arg);
			echo $result;
			exit;
		} else {
			$arg = array(array(
				"confirm" => "ok"));
			$result = json_encode($arg);
			
			$_SESSION[userid] = $db_id;
			$_SESSION[username] = $db_name;
			exit;
		}
	}
?>

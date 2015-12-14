<?
	require_once "../lib/dbconn.php";

	$id = ($_POST[id]);	

	$sql = "select * from member where id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$db_id = $row[id];

	if($db_id == $id){
		$arg = array(array(
			"confirm" => "no"
			));
		$result = json_encode($arg);
		echo $result;
		exit;
	} else {
		$arg = array(array(
			"confirm" => "ok"
			));
		$result = json_encode($arg);
		echo $result;
		exit;
	}

?>
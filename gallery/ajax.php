<?

 // include "../lib/dbconn.php";
 // $sql = "select * from member where id='$nt'";
 // $result = $dbconn->query($sql);
 // $row = $result->fetch_assoc();
 // $db_id = $row[id];
 // $db_id = 
 // echo "$db_id";
 $pw = ($_POST[tt]);
 $pw2 = ($_POST[ee]);
if($pw2 == $pw){
	$arg = array(
		array("okk" => "ok")
	);

	$result = json_encode($arg);

	echo $result;
	
	exit;
}else{
	$arg = array(
		array("okk" => "no")
	);

	$result = json_encode($arg);

	echo $result;
	
	exit;
}
?>
<?

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
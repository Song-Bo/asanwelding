<meta charset="UTF-8">
<?	
	$pass1 = $_POST[pw];
	$pass2 = $_POST[pw2];
 
	if($pass2 == $pass1){

		$arg = array(
				array("confirm" => "ok"));

		$result = json_encode($arg);
		echo $result;	
		exit;

	} else {

		$arg = array(
			array("confirm" => "no"));

	$result = json_encode($arg);
	echo $result;	
	exit;
}
?>
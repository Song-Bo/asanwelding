<?	
	$check = ($_POST[pw]);
	$check2 = ($_POST[pw2]);

	if($check2 == $check){
		$arg = array(
			array("confirm" => "ok")
			);

		$result = json_encode($arg);
		echo $result;	
		exit;

	} else {
		$arg = array(
		array("confirm" => "no")
			);
		$result = json_encode($arg);
		echo $result;	
		exit;	
	}
?>
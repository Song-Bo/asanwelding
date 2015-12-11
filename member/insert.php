<meta charset="UTF-8">
<?
	session_start();

	// CAPTCHA 확인
	$cap = 'notEq';
	if ($_POST['captcha'] == $_SESSION['captcha']) {
		// Captcha verification is Correct. Do Something Here !
		$cap = 'Eq';
	} else {
		// Captcha verification is Wrong. Take other action !
		$cap = '';

		echo "<script>
				alert('문자가 일치 하지 않습니다.');
				history.go(-1);
			  </script>";
		exit;
	}

	// FORM POST 받아오기
	$id = $_POST[id];
	$pw = $_POST[pw];
	$pw2 = $_POST[pw2];
	$name = $_POST[name];
	$birth = $_POST[birth];
	$phone = $_POST[phone];
	$email = $_POST[email];
	$regist_day = date("Y-m-d (H:i)");
	
	$user_pass_phrase = sha1($_POST['captcha']);
	$ip = $REMOTE_ADDR; // 방문자 IP 저장
?>
<?
	require_once "../lib/dbconn.php";

	$sql = "select * from member where id='$id'";
	$result = $conn->query($sql);
	
	if ($result === TRUE) {
		echo "<script>
				alert('해당 아이디가 존재 합니다.');
				history.go(-1);
			  </script>";
		exit;
	} else {
		$sql = "insert into member(id, pass, name, birth, phone, email, regist_day)";
		$sql.= " values ('$id', '$pw', '$name', '$birth', '$phone', '$email', '$regist_day')";

		$result = $conn->query($sql);
	}

	$conn->close();

	echo "<script>
			alert('아산용접배관학원에 오신걸 환영 합니다 !');
			location.href='../introduce/introduce.php'
		  </script>";	

?>

<meta charset="UTF-8">
<?
	session_start();
	$id = $_POST[id];
	$pw = $_POST[pw];

	if (!$id) {
		echo "<script>
				window.alert('아이디를 입력 하세요.');
				history.go(-1);
			  </script>";
		exit;
	}

	if (!$pw) {
		echo "<script>
		        window.alert('비밀번호를 입력하세요.');
		        history.go(-1);
		      </script>";
		exit;
	}

	require_once "../lib/dbconn.php";

	$sql = "select * from member where id='$id'";
	$result = $conn->query($sql);
	// $num_match = $result->fetch_assoc();
	$num_match = mysqli_num_rows($result);

	if (!$num_match) {
		echo "<script>
		  	 	window.alert('등록되지 않은 아이디 입니다.');
		  	 	history.go(-1);
		  	  </script>";
	} else {
		$row = mysqli_fetch_assoc($result);
		// $row = $result->fetch_assoc();

		$db_pw = $row[pass];

		if ($pw != $db_pw) {
			echo "<script>
					alert('비밀번호가 일치하지 않습니다.');
					history.go(-1);
				  </script>";			
		} else {
			$userid = $row[id];
			$username = $row[name];

			$_SESSION['userid'] = $userid;
			$_SESSION['username'] = $username;

			echo "<script>
					location.href='../introduce/introduce.php';
				  </script>";
		}
	}

?>

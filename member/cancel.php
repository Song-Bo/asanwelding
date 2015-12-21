<?
	session_start();
	$id = $_SESSION[userid];
	$pw = $_POST[pw2];

	require_once "../lib/dbconn.php";

	$sql = "select pass from member where id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($row[pass] != $pw) {
		echo "<script>
		        window.alert('비밀번호가 틀립니다 !');
		        history.go(-1);
		       </script>
		       ";
		exit;
	}


	$sql = "delete from member where id='$id'";
	$result = $conn->query($sql);

	if($result) {
		echo "<script>
		       window.alert('ㅠ_ㅠ 안녕히 가세요');
		       location.href='../index.php';
		       </script>
		       ";
		unset($_SESSION[userid]);
		unset($_SESSION[username]);
		   exit;
	} else {
		echo "<script>
		       window.alert('회원 탈퇴 실패 !');
		       location.href='../index.php';
		       </script>
		       ";
		   exit;
	}

	$conn->close();
?>

<meta charset="UTF-8">
<?
	session_start();
	// FORM POST 받아오기	
	$id = $_SESSION[userid];
	$pw2 = $_POST[pw2];
	$name = $_POST[name];
	$birth = $_POST[birth];
	$phone = $_POST[phone];
	$email = $_POST[email];
	$regist_day = date("Y-m-d (H:i)");	
	
	$ip = $REMOTE_ADDR; // 방문자 IP 저장

	require_once "../lib/dbconn.php";
	$sql = "select * from member where id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$db_pw = $row[pass];

	if ($pw2 != $db_pw) {
		echo "<script>
		        window.alert('비밀번호가 틀립니다 !')
		        history.go(-1);
		      </script>";
		      exit;
	}
?>
<?
	

	$sql = "update member set name='$name', birth='$birth', ";
	$sql.= "phone = '$phone', email = '$email', regist_day='$regist_day' where id='$id'";

	$result = $conn->query($sql);
	
	$conn->close();

	echo "<script>
			alert('수정 되었습니다 !');
			location.href='../introduce/introduce.php'
		  </script>";	


	$_SESSION[userid] = $id;
	$_SESSION[username] = $name;

?>

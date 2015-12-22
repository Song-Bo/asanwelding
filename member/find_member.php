<?
	require_once "../lib/dbconn.php";
	if ($_POST ['find_id']) {
		$name = $_POST ['name'];
		$email = $_POST ['email'];
		$sql = "select id from member where name='$name' and email='$email'";
		$result = $conn->query ( $sql );
		if ($result->num_rows) {
			$row = $result->fetch_assoc ();
			$id = $row ['id'];
			?>
			<script>
				window.alert("회원님의 아이디는 '<?echo $id?>' 입니다.")
				history.go(-2)
			</script>
			<?} else {?>
			<script>
				window.alert('입력하신 정보에 해당하는 아이디가 없습니다.')
				history.go(-1)
			</script>
			<?
		}
	} else if ($_POST ['find_pass']) {
		$id = $_POST ['id'];
		$email = $_POST ['email'];
		$hp = $_POST ['hp'];
		$sql = "select * from member where id='$id' and email='$email' and phone='$hp'";
		$result = $conn->query ( $sql );
		
		if ($result->num_rows!=null) {
			require_once "random_string.php";
			?>
			<form action="../admin/sendmail.php?email=<?echo $email?>"
				method="post" name="temp_pass">
				<input type="hidden" name=id value="<?echo $id?>"><input type="hidden"
				name=pass value="dbapzndl2"> <input type="hidden" name=subject
				value="<?echo '임시비밀번호 입니다.'?>"> <input type="hidden" name=content
				value="<?echo $ran_str?>">
			</form>
			<script>
				document.temp_pass.submit();
				window.alert("임시 비밀번호를 메일로 전송하였습니다. 확인 후 비밀번호를 변경해 주시기 바랍니다. ")
			</script>
			<?} else {?>
			<script>
				window.alert('입력하신 정보에 해당하는 비밀번호가 없습니다.')
				history.go(-1)
			</script>
			<?}}?>


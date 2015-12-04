<meta charset="UTF-8">
<?
	session_start();
	$table = "qna";
	$page = $_GET[page];
	$num = $_GET[num];	
	$mode = $_GET[mode];
	$subject = $_POST[subject];
	$content = $_POST[content];
	$writer = $_POST[writer];

	if(!$subject) {
		echo("
	   <script>
	     window.alert('제목을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	   exit;
	}

	if(!$content) {
		echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	   exit;
	}

	$regist_day = date("Y-m-i (H:i)");

	include "../lib/dbconn.php";

	if ($mode == "modify") {
		$sql = "update $table set subject='$subject', content='$content' where num=$num";
		$conn->query($sql);
	} else {
		if ($mode == "response") {	
			// 부모 글 가져오기
			$sql = "select * from $table where num=$num";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();

			// 부모 글로 부터 group_num, depth, ord 값 설정
			$group_num = $row[group_num];
			$depth = $row[depth] + 1;
			$ord = $row[ord] + 1;

			// 해당 그룹에서 ord가 부모글의 ord($row[ord])보다 큰 경우엔 ord값 1 증가
			$sql = "update $table set ord=ord+1 where group_num=$row[group_num] and ord > $row[ord]";
			$conn->query($sql);

			// 레코드 삽입
			$sql = "insert into $table (group_num, depth, ord, nick, subject, ";
			$sql.= "content, regist_day, hit) ";
			$sql.= "values ($group_num, $depth, $ord, '$writer', '$subject', '$content', '$regist_day', 0)";
		} else {
			// depth, ord 를 0으로 초기화
			$depth = 0;
			$ord = 0;

			// 레코드 삽입 (group_num 제외)
			$sql = "insert into $table (depth, ord, nick, subject, content, regist_day, hit) ";
			$sql.= "values($depth, $ord, '$writer', '$subject', '$content', '$regist_day', 0)";
			$conn->query($sql);

			// 최근 auto_increment 필드(num)값 가져오기
			$sql = "select last_insert_id(num) as autonum from qna order by autonum desc";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$auto_num = $row[autonum];

			// group_num 값 업데이트
			$sql = "update $table set group_num=$auto_num where num=$auto_num";
			$conn->query($sql);
		}
	}

	$conn->close();

	echo "<script>
			window.alert('등록 되었습니다 !');
			location.href='list.php?table=$table&page=$page';
		  </script>";


?>
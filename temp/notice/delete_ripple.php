<meta charset="UTF-8">
<?
	$num = $_GET[num];
	$ripple_num = $_GET[ripple_num];
	$table = "notice_ripple";

	require_once "../../lib/dbconn.php";

	$sql = "delete from $table where num=$ripple_num";
	$conn->query($sql);
	$conn->close();

	echo "<script>
			window.alert('삭제 되었습니다.');
			location.href= 'view.php?table=$table&num=$num';
		  </script>";
?>
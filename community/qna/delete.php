<meta chasret="UTF-8">
<?
	session_start();
	$num = $_GET[num];
	$table = "qna";

	include "../../lib/dbconn.php";

	$sql = "delete from $table where num=$num";
	$conn->query($sql);

	$conn->close();

	echo "<script> 
	        window.alert('삭제 되었습니다 !');
			location.href='list.php?table=$table';
		  </script>";
?>
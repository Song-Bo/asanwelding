<meta charset="UTF-8">
<?
	session_start();

	$num = $_GET[num];
	$table = "download";

	require_once "../../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	$copied_name[0] = $row[file_copied_0];
	$copied_name[1] = $row[file_copied_1];
	$copied_name[2] = $row[file_copied_2];

	for ($i=0; $i < 3; $i++) { 
		if ($copied_name[$i]) {
			$file_name = "./data/".$copied_name[$i];
			unlink($file_name);
		}
	}

	$sql = "delete from $table where num=$num";
	$conn->query($sql);

	$conn->close();

	echo "<script> 
			window.alert('삭제 되었습니다 !');
			location.href='list.php?table=$table';
		  </script>";
?>
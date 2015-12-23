<?
	require_once "../lib/dbconn.php";

	$page = $_GET[page];
	$url = "http://$_SERVER[HTTP_HOST]/asan";

	$gallery_sql = "select * from gallery order by num desc";
	$gallery_result = $conn->query($gallery_sql);

	$gallery_total = mysqli_num_rows($gallery_result);

	for ($i=0; $i < $gallery_total; $i++) { 
		
		mysqli_data_seek($gallery_result, $i); // 포인터 이동
		$gallery_row = $gallery_result->fetch_assoc(); // 하나의 레코드 가져오기
		$gallery_num = $gallery_row[num];
		$gallery_item = $gallery_row[file_copied_0];
		
?>	
		<li>
		<p><a href="<?=$url?>/gallery/site/view.php?table=gallery&num=<?=$gallery_num?>&page=<?=$page?>">
		<img src="<?=$url?>/gallery/site/data/<?=$gallery_item?>" width="824" height="490"></a>
		</p>
		</li>
<?
	}
?>
<meta charset="UTF-8">
<?
	session_start();
	include "../lib/dbconn.php";
	$table = "notice";
	$num = $_GET[num];

	$usernick = $_SESSION[nick];
	$userid = $_SESSION[id];

	$sql = "select * from $table where num=$num";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$item_num = $row[num];
	$item_id = $row[id];
	$item_name = $row[name];
	$item_nick = $row[nick];
	$item_hit = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];
	$image_name[3]   = $row[file_name_3];
	
	$file_name[0]   = $row[file_name_0];
	$file_name[1]   = $row[file_name_1];
	$file_name[2]   = $row[file_name_2];
	$file_name[3]   = $row[file_name_3];
	
	$file_type[0]   = $row[file_type_0];
	$file_type[1]   = $row[file_type_1];
	$file_type[2]   = $row[file_type_2];
	$file_type[3]   = $row[file_type_3];
	
	$file_copied[0] = $row[file_copied_0];
	$file_copied[1] = $row[file_copied_1];
	$file_copied[2] = $row[file_copied_2];
	$file_copied[3] = $row[file_copied_3];
	
	
	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];
	$image_copied[3] = $row[file_copied_3];
	

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$item_content = $row[content];
	// $is_html      = $row[is_html];

	// if ($is_html!="y") {
	// 	$item_content = str_replace(" ", "&nbsp;", $item_content);
	// 	$item_content = str_replace("\n", "<br>", $item_content);
	// }	

	for ($i=0; $i<2; $i++) {
		if ($image_copied[$i]) {
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		} else {
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	$conn->query($sql);
?>
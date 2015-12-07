<?
	function latest_article ($table, $loop, $char_limit) {
		include "../lib/dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()) {
			$num = $row[num];
			$len_subject = strlen($row[subject]);
			$subject = $row[subject];

			if ($len_subject > $char_limit) {
				$subject = mb_substr($row[subject], 0, $char_limit, 'UTF-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

			echo "<div class='col1'>
					<a href='./$table/view.php?table=$table&num=$num'>$subject</a>
				  </div>
				  <div class='col2'>$regist_day</div>
				  <div class='clear'></div>";
		}

		$conn->close();
	}
?>
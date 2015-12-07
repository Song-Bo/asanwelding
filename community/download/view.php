<?
	session_start();
	$table = "download";
	$page = $_GET[page];
	$num = $_GET[num];	

	require_once "../../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$item_num = $row[num]; 
	$item_nick = $row[nick];
	$item_hit = $row[hit];

	$file_name[0] = $row[file_name_0];
	$file_name[1] = $row[file_name_1];
	$file_name[2] = $row[file_name_2];

	$file_type[0] = $row[file_type_0];
	$file_type[1] = $row[file_type_1];
	$file_type[2] = $row[file_type_2];

	$file_copied[0] = $row[file_copied_0];
	$file_copied[1] = $row[file_copied_1];
	$file_copied[2] = $row[file_copied_2];

	$item_date = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp", $row[subject]);
	$item_content = str_replace(" ", "&nbsp", $row[content]);
	$item_content = str_replace("\n", "<br>", $item_content);
	
	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";  // 조회수 증가
	$conn->query($sql);
?>
<?
	require_once "../../lib/header.php";
?>
<script>
	function del(href) {
		if (confirm("한번 삭제한 자료는 복구할 방법이 없습니다. \n\n 정말 삭제 하시겠습니까?")) {
			document.location.href = href;
		}
	}
</script>
<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<? require_once "../lib/community_sub_nav.php"; ?>
			<div class="main_content">

				<div class="main_co1">
					<h3> 자료실 </h3>
				</div>

				<div class="main_co2" style="padding:0px 32px 50px">
					<div class="title">
					<!-- <img src="../img/title_free.gif"> -->
					</div>


			<!-- <div id="view_comment"> &nbsp; </div> -->
					
					<div id="view_title">
						<div class="view_title1"><b><?= $item_subject ?></b></div>
						<div class="view_title2"><b><?= $item_nick ?></b>&nbsp;&nbsp;|&nbsp;&nbsp;조회수 : <?= $item_hit ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?= $item_date ?></div>
					</div>

				<div id="view_content">
			<?
				for ($i=0; $i < 3; $i++) { 
					if ($userid == "root" || $file_copied[$i]) {
						$show_name = $file_name[$i];
						$real_name = $file_copied[$i];
						$real_type = $file_type[$i];
						$file_path = "./data/".$real_name;
						$file_size = filesize($file_path);

						echo "☞ 첨부파일 : $show_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
							<a href='download.php?table=$table&num=$num&real_name=$real_name&
							show_name=$show_name&file_type=$real_type'>[저장]</a><br>";

					}
				}
			?>
				<br>
						<?= $item_content ?>
				</div>

				<div id="view_button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">
					<img src="../../img/board/list.png"></a>&nbsp;
			<?
				if ($userid == $item_id || $userid == "root") {
			?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">
				<img src="../../img/board/modify.png"></a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">
				<img src="../../img/board/delete.png"></a>&nbsp;
			<?
				}
			?>

			<?
				// if ($userid == "root") { }
			?>
				<a href="write_form.php?table=<?=$table?>"><img src="../../img/board/write.png"></a>

				<div class="clear"></div>
				</div><!-- end of $view_button -->
				</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	require_once "../../lib/footer.php";
?>
<?
	session_start();
	$table = "free";
	$page = $_GET[page];
	$num = $_GET[num];
	
	$userid = $_SESSION[userid];
    $username = $_SESSION[username];	

	require_once "../../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$item_num = $row[num];
  	$item_id = $row[id];
	$item_name = $row[name];
	$item_hit = $row[hit];

	$image_name[0] = $row[file_name_0];
	$image_name[1] = $row[file_name_1];
	$image_name[2] = $row[file_name_2];

	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

	$item_date = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp", $row[subject]);
	$item_content = $row[content];

	for ($i=0; $i < 3; $i++) { 		
		if ($image_copied[$i]) {
			$imageinfo = getimagesize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i] = $imageinfo[2];

			if ($image_width[$i] > 760) {
				$image_width[$i] = 760;
			}
		} else {
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i] = "";
		}
	}

	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";  // 조회수 증가
	$conn->query($sql);
?>
<?
	require_once "../../lib/header.php";
?>
<script>
	function check_input() {
		if (!document.ripple_form.ripple_content.value) {
			alert("내용을 입력하세요 !");
			document.ripple_form.ripple_content.focus();
			return;
		}
		
		document.ripple_form.submit();
	}

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
			<? require_once "../../lib/community_sub_nav.php"; ?>
			<div class="main_content">

				<div class="main_co1">
					<h3> 자유 게시판 </h3>
				</div>

				<div class="main_co2" style="padding:0px 32px 50px">
					<div class="title">
					<!-- <img src="../img/title_free.gif"> -->
					</div>


			<!-- <div id="view_comment"> &nbsp; </div> -->
					
					<div id="view_title">
						<div class="view_title1"><b><?= $item_subject ?></b></div>
						<div class="view_title2"><b><?= $item_name ?></b>&nbsp;&nbsp;|&nbsp;&nbsp;조회수 : <?= $item_hit ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?= $item_date ?></div>
					</div>

				<div id="view_content">
			<?
				for ($i=0; $i < 3; $i++) { 
					if ($image_copied[$i]) {
						$img_name = $image_copied[$i];
						$img_name = "./data/".$img_name;
						$img_width = $image_width[$i];

						echo "<img src='$img_name' width='$img_width'>"."<br><br>";
					}
				}
			?>
						<?= $item_content ?>
				</div>


<!-- start of ripple -->


				<div id="ripple">
			<?
				$sql = "select * from free_ripple where parent='$item_num'";
				$ripple_result = $conn->query($sql);

				while ($row_ripple = ($ripple_result->fetch_assoc())) {
					$ripple_num = $row_ripple[num];
					$ripple_id = $row_ripple[id];
					$ripple_name = $row_ripple[name];
					$ripple_content = str_replace("\n", "<br><br>", $row_ripple[content]);
					$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
					$ripple_date = $row_ripple[regist_day];
			?>
					<div id="ripple_writer_title">
						<ul>
							<li class="writer_title1"><?=$ripple_name?></li>
							<li class="writer_title2"><?=$ripple_date?></li>
							<li class="writer_title3">
			<?
				if ($userid == "admin" || $userid == $rippple_id) {
					echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>";		
				}
			?>
							</li>
						</ul>
					</div><!-- end of #ripple_writer_title -->

					<div id="ripple_content"><?=$ripple_content?></div>
					<div class="hor_line_ripple"></div>
			<?
				}
			?>
					<!-- start of FORM -->
					<form name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">
					<div id="ripple_box">
						<div class="ripple_box1"><img src="../../img/board/title_comment.png"></div>
						<div class="ripple_box2"><textarea rows="5" cols="60" name="ripple_content"></textarea></div>
						<div class="ripple_box3"><a href="#"><img src="../../img/board/ok_ripple.png" onclick="check_input()"></a></div>
					</div><!-- end of #ripple_box -->
					</form>
					<!-- end of FORM -->
				</div>

<!-- end of ripple -->



				<div id="view_button">
					<a href="list.php?table=<?= $table ?>&page=<?=$page?>"><img src="../../img/board/list.png"></a>&nbsp;
			<?
				if ($userid && ($userid == $item_id) || $userid == "admin") {
			?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">
					<img src="../../img/board/modify.png"></a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">
					<img src="../../img/board/delete.png"></a>&nbsp;
			<?
				}
			?>
			
			<?
				if($userid) {
			?>
				<a href="write_form.php?table=<?= $table ?>"><img src="../../img/board/write.png"></a>
			<?
				}
			?>
				</div><!-- end of #view_button -->

				<div class="clear"></div>

				</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	require_once "../../lib/footer.php";
?>
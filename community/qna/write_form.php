<?
	session_start();

	$table = "qna";

	$num = $_GET[num];
	$page = $_GET[page];
	
	$mode = $_GET[mode];
	$subject= $_POST[subject];
	$content= $_POST[content];	
?>
<?
	require_once "../../lib/header.php";	
?>
<?
	if ($mode=="modify" || $mode=="response") {
		require_once "../../lib/dbconn.php";

		$sql = "select * from $table where num=$num";

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		$item_subject = $row[subject];
		$item_content = $row[content];

		if ($mode == "response") {
			$item_subject = "[re]".$item_subject;
			$item_content = ">".$item_content;
			$item_content = str_replace("\n", "\n>", $item_content);
			$item_content = "\n\n".$item_content;
		}

		$conn->close();
	}
?>
<script>
	function check_input() {
		if (!document.board_form.writer.value) {
			alert('작성자명을 입력하세요 !');
			document.board_form.writer.focus();
			return;
		}
		if (!document.board_form.subject.value) {
			alert('제목을 입력하세요 !');
			document.board_form.subject.focus();
			return;
		}
		if (!document.board_form.content.value) {
			alert('내용을 입력하세요 !');
			document.board_form.content.focus();
			return;
		}
		document.board_form.submit();
	}
</script>
<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
			<? require_once "../../lib/community_sub_nav.php"; ?>
			<div class="main_content">
				<!-- start of main_co1 -->
				<div class="main_co1">
					<h3> Q & A&nbsp;&nbsp;-&nbsp;&nbsp;질문하기 </h3>
				</div>


				<!-- start of main_co2 -->
				<div class="main_co2" style="padding:0px 32px 50px">
					<div class="title">
						<!-- <img src="../img/title_free.gif"> -->
					</div>

					<div id="write_form_title">
						<img src="../../img/board/write_form_title.gif">
					</div>

					<div class="clear"></div>
	
			<?
				if ($mode == "modify") {
			?>
				<form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
			<?
				} else if ($mode == "response") {
			?>
				<form name="board_form" method="post" action="insert.php?mode=response&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>">
			<?
				} else {
			?>
				<form name="board_form" method="post" action="insert.php?table=<?=$table?>">
			<?
				}
			?>
		
				<!-- start of #write_form -->
				<div id="write_form">
					<div class="write_line"></div> 						
						<div class="write_row1"><div class="col1"> 작성자 </div>
												<div class="col2"><input type="text" name="writer" value="<?= $item_nick ?>"></div>
									
						</div><!-- end of write_row1 -->
			
					<div class="write_line"></div>
						<div class="write_row2"><div class="col1"> 질문하기 </div>
												<div class="col2"><input type="text" name="subject" size="73" value="<?=$item_subject?>"></div>
						</div><!-- end of write_row2 -->
					<div class="write_line"></div>

						<div class="write_row3"><div class="col1"> 내용 </div>
												<div class="col2"><textarea rows="12" cols="73" name="content"><?=$item_content?></textarea></div>
						</div><!-- end of write_row3 -->

					<div class="write_line"></div>

					<div class="clear"></div>

		
				</div><!-- end of #write_form -->

				<!-- start of #write_button -->
				<div id="write_button"><a href="#"><img src="../../img/board/ok.png" onclick="check_input()"></a>
								&nbsp; <a href="list.php?table=<?=$table?>&page=<?=$page?>">
										<img src="../../img/board/list.png"></a>

				</div><!-- end of #write_button -->
				</form><!-- end of form -->

				</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	require_once "../../lib/footer.php";
?>
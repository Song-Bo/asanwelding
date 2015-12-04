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
	include "../lib/header.php";	
?>
<?
	if ($mode=="modify" || $mode=="response") {
		include "../lib/dbconn.php";

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

<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
			<div class="nav">
				<img src="../img/nav_menu3.png" width="200" height="200" alt="커뮤니티">
			</div>
			<div class="sub_nav">
				<div class="sub_nav1" style="padding: 30px 20px 10px">
					<a href="../free/list.php"><h3>자유 게시판</h3></a>
				</div>
				<div class="sub_nav2" style="padding: 10px 20px 10px">
					<a href="../job/list.php"><h3>취업소식</h3></a>
				</div>
				<div class="sub_nav3" style="padding: 10px 20px 10px">
					<a href="../download/list.php"><h3>자료실</h3></a>
				</div>
				<div class="sub_nav4" style="padding: 10px 20px 10px">
					<a href="../qna/list.php"><h3>Q & A</h3></a>
				</div>
			</div><!-- end of sub_nav -->
			</div><!-- end of nav_wrap -->
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
						<img src="../img/board/write_form_title.gif">
					</div>

					<div class="clear"></div>
	
			<?
				if ($mode == "modify") {
			?>
				<form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
			<?
				} else {
			?>
				<form name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data">
			<?
				}
			?>
		
				<!-- start of #write_form -->
				<div id="write_form">
					<div class="write_line"></div> 						
						<div class="write_row1"><div class="col1"> 작성자 </div>
												<div class="col2"><input type="text" name="writer" value="<?= $item_nick ?>"></div>
			
			<?
				if ($mode != "modify") {
			?>
							<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기 </div>
			<?
				}
			?>
			
						</div><!-- end of write_row1 -->
			
					<div class="write_line"></div>
						<div class="write_row2"><div class="col1"> 제목 </div>
												<div class="col2"><input type="text" name="subject" size="73" value="<?=$item_subject?>"></div>
						</div><!-- end of write_row2 -->
					<div class="write_line"></div>

						<div class="write_row3"><div class="col1"> 내용 </div>
												<div class="col2"><textarea rows="12" cols="73" name="content"><?=$item_content?></textarea></div>
						</div><!-- end of write_row3 -->

					<div class="write_line"></div>


						<div class="write_row4"><div class="col1"> 이미지파일 1 </div>
												<div class="col2"><input type="file" name="upfile[]"></div>
						</div><!-- end of write_row4 -->

					<div class="clear"></div>

			<?
				if ($mode == "modify" && $item_file_0) {
			?>
					<div class="delete_ok"><?=$item_file_0?> 파일이 등록 되어 있습니다.
					<input type="checkbox" name="del_file[]" value="0"> 삭제 </div>
					<div class="clear"></div>
			<?
				}		
			?>
					<div class="write_line"></div>


						<div class="write_row5"><div class="col1"> 이미지파일 2 </div>
												<div class="col2"><input type="file" name="upfile[]"></div>
						</div><!-- end of write_row5 -->

					<!-- <div class="clear"></div> -->

			<?
				if ($mode == "modify" && $item_file_1) {
			?>
					<div class="delete_ok"><?=$item_file_1?> 파일이 등록 되어 있습니다.
					<input type="checkbox" name="del_file[]" value="1"> 삭제 </div>
					<div class="clear"></div>
			<?
				}		
			?>
					<div class="write_line"></div>
					<div class="clear"></div>

						<div class="write_row6"><div class="col1"> 이미지파일 3 </div>
												<div class="col2"><input type="file" name="upfile[]"></div>
						</div><!-- end of write_row6 -->

					<!-- <div class="clear"></div> -->

			<?
				if ($mode == "modify" && $item_file_2) {
			?>
					<div class="delete_ok"><?=$item_file_2?> 파일이 등록 되어 있습니다.
					<input type="checkbox" name="del_file[]" value="2"> 삭제 </div>
					<div class="clear"></div>
			<?
				}		
			?>
					<div class="write_line"></div>
					<div class="clear"></div>
				</div><!-- end of #write_form -->

				<!-- start of #write_button -->
				<div id="write_button"><a href="#"><img src="../img/board/ok.png" onclick="check_input()"></a>
								&nbsp; <a href="list.php?table=<?=$table?>&page=<?=$page?>">
										<img src="../img/board/list.png"></a>

				</div><!-- end of #write_button -->
				</form><!-- end of form -->

				</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	include "../lib/footer.php";
?>
<?
	session_start();

	$table = "free";

	$num = $_GET[num];
	$page = $_GET[page];

	/*
	$userid = $_SESSION[userid];
	$username = $_SESSION[username];
    $usernick = $_SESSION[usernick];
    $userlevel = $_SESSION[userlevel];
	*/

	$mode = $_GET[mode];
	$subject= $_POST[subject];
	$content= $_POST[content];

	include "../../lib/dbconn.php";

	if ($mode == "modify") {
		$sql = "select * from $table where num=$num";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$item_nick = $row[nick];
		$item_subject = $row[subject];
		$item_content = $row[content];
		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];
		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!--[if IEMobile 7]><html class="iem7"  lang="en" dir="ltr"><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7"  lang="en" dir="ltr"><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8"  lang="en" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="lt-ie9"  lang="en" dir="ltr"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<link rel="stylesheet" type="text/css" href="../../css/common.css" media="all">
<link rel="stylesheet" type="text/css" href="../../css/freeboard.css" media="all">
<title>커뮤니티 - 자유게시판</title>
<script src="http://code.jquery.com/jquery-1.11.3.js"></script>
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
</head>
<body>
<!-- start of header -->
<div id="header" class="header">
	<? include "../../lib/header2.php"; ?>
</div><!-- end of Header -->

<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
			<div class="nav">
				<img src="../../img/nav_menu3.png" width="200" height="200" alt="커뮤니티">
			</div>
			<div class="sub_nav">
				<div class="sub_nav1" style="padding: 30px 20px 20px">
					<a href="../free/list.php"><h3>자유 게시판</h3></a>
				</div>
				<!-- <div class="sub_nav1">
					<a href="#"><img src="../img/sub_nav_1.png" width="200" height="66"></a>
				</div>
				<div class="sub_nav2">
					<img src="../img/sub_nav_2.png" width="200" height="56">
				</div> -->
			</div>
			</div>
			<div class="main_content">
				<!-- start of main_co1 -->
				<div class="main_co1">
					<h3> 자유 게시판&nbsp;&nbsp;-&nbsp;&nbsp;글쓰기 </h3>
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
												<div class="col2"><input type="text" name="subject" value="<?=$item_subject?>"></div>
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


<!-- start of footer-->
<div id="footer" align="center">
<img src="../../img/footercopyrighter.png" alt="푸터">
</div><!-- end of footer -->	
</body>
</html>
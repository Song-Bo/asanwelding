<?
	session_start();
	$table = "free";
	$ripple = "free_ripple";

	$page = $_GET[page];
	$num = $_GET[num];

	$mode = $_GET[mode];

	$search = $_POST[search];
	$find = $_POST[find];
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
</script>
</head>
<?
	include "../../lib/dbconn.php";

	$scale = 10; // 한 화면에 표시되는 글 수

	if ($mode == "search") {
		if (!$search) {
			echo "<script>
					window.alert('검색할 단어를 입력해 주세요!');
					history.go(-1);
				  </script>";
			exit;
		}
		$sql = "select * from $table where $find like '%$search%' order by num desc";
	} else {
		$sql = "select * from $table order by num desc";
	}

	$result = $conn->query($sql);
	$total_record = $result->num_rows;  // 전체 글수

	// 전체 페이지 수($total_page) 계산
	if ($total_record % $scale == 0) {
		$total_page = floor($total_record/$scale);
	} else {
		$total_page = floor($total_record/$scale) + 1;
	}

	if (!$page) {   // 페이지번호($page)가 0일 때
		$page = 1;  // 페이지 번호를 1로 초기화
	}

	// 표시할 페이지($page)에 따라 $start 계산
	$start = ($page-1) * $scale;
	$number = $total_record - $start;
?>
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
				<div class="sub_nav1" style="padding: 20px 40px 20px">
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

				<div class="main_co1">
					<h3> 자유 게시판 </h3>
				</div>

				<div class="main_co2" style="padding:0px 32px 50px">
					<div class="title">
						<!-- <img src="../img/title_free.gif"> -->
					</div>

					<!-- form START !!! -->
					<form name="board_form" method="post" action="list.php?table=<?= $table ?>&mode=search">

					<div id="list_search">

						<div class="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다. </div>
						<div class="list_search2"><img src="../../img/board/select_search.gif"></div>
						<div class="list_search3"><select name="find">
													<option value="subject">제목</option>
													<option value="content">내용</option>
													<option value="nick">작성자</option>
												  </select></div>						
						<div class="list_search4"><input type="text" name="search"></div>
						<div class="list_search5"><input type="image" src="../../img/board/list_search_button.gif"></div>
					</div> <!-- end of #list_search -->
					</form>
					<!-- form END !!! -->


					<div class="clear"></div>


					<div id="list_top_title">
						<ul>
							<li class="list_title1"><img src="../../img/board/list_title1.gif"></li>
							<li class="list_title2"><img src="../../img/board/list_title2.gif"></li>
							<li class="list_title3"><img src="../../img/board/list_title3.gif"></li>
							<li class="list_title4"><img src="../../img/board/list_title4.gif"></li>
							<li class="list_title5"><img src="../../img/board/list_title5.gif"></li>
						</ul>
					</div><!-- end of #list_top_title -->


					<div id="list_content">
				<?
					for ($i=$start; $i < $start+$scale && $i < $total_record; $i++) { 
						mysqli_data_seek($result, $i);    // 포인터 이동
						$row = $result->fetch_assoc();    // 하나의 레코드 가져오기

						$item_num = $row[num];
						/* $item_id = $row[id] */
						/* $item_name = $row[name] */
						$item_nick = $row[nick];
						$item_hit = $row[hit];
						$item_date = $row[regist_day];
						$item_date = substr($item_date, 0, 10);
						$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

						$sql = "select * from $ripple where parent=$item_num";
						$result2 = $conn->query($sql);
						$num_ripple = $result2->num_rows;
				?>
					<div id="list_item">
						<div class="list_item1"><?= $number ?> </div>
						<div class="list_item2"><a href="view.php?table=<?= $table ?>&num=<?= $page ?>"><?= $item_subject ?></a></div>
				<?
					if ($num_ripple) echo "[$num_ripple]";
				?>						
						<div class="list_item3"><?= $item_nick ?></div>
						<div class="list_item4"><?= $item_date ?></div>
						<div class="list_item5"><?= $item_hit ?></div>
					</div><!-- end of #list_item -->
				<?
					$number--;
				}
				?>

					<div id="page_button">
						<div class="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp;
				<?
					// 게시판 목록 하단에 페이지 링크 번호 출력
					for ($i=1; $i<=$total_page; $i++) { 
						if ($page == $i) { // 현재 페이지 번호 링크 안함
							echo "<b> $i </b>";
						} else {
							echo "<a href='list.php?table=$table&page=$i'> $i </a>";
						}
					}
				?>
						&nbsp;&nbsp;&nbsp;&nbsp; 다음 ▶
						</div>
						<div class="button">
							<a href="list.php?table=<?= $table ?>&page=<?= $page ?>">
							<img src="../../img/board/list.png"></a> &nbsp;
							<a href="write_form.php?table=<?= $table ?>">
							<img src="../../img/board/write.png"></a>
				<!--
				<?
					if($userid) {
				?>
					<a href="write_form.php?table=<?= $table ?>"><img src="../img/board/write.png"></a>
				<?
					}
				?>
				-->
						</div><!-- end of button -->
					</div><!-- end of page_button -->
				</div><!-- end of list content -->

				<div class="clear"></div>

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
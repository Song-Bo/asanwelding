<?
	session_start();
	$table = "qna";

	$page = $_GET[page];
	$num = $_GET[num];
	$mode = $_GET[mode];

	$search = $_POST[search];
	$find = $_POST[find];
?>
<?
	include "../lib/header.php";
	include "../lib/dbconn.php";

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
		$sql = "select * from $table order by group_num desc, ord asc";
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

				<div class="main_co1">
					<h3> Q & A </h3>
				</div>

				<!-- 메인 시작 -->
				<div class="main_co2" style="padding:0px 32px 50px">
					<div class="title">
						<!-- <img src="../img/title_free.gif"> -->
					</div>

					<!-- form START !!! -->
					<form name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search">

					<div id="list_search">

						<div class="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다. </div>
						<div class="list_search_form">
						<div class="list_search2"><img src="../img/board/select_search.gif"></div>
						<div class="list_search3"><select name="find">
													<option value="subject">제목</option>
													<option value="content">내용</option>
													<option value="nick">작성자</option>
												  </select></div>						
						<div class="list_search4"><input type="text" name="search"></div>
						<div class="list_search5"><input type="image" src="../img/board/list_search_button.gif"></div>
						</div><!-- end of list_search_form -->
					</div> <!-- end of #list_search -->
					</form>
					<!-- form END !!! -->


					<div class="clear"></div>


					<div id="list_top_title">
						<ul>
							<li class="list_title1"><img src="../img/board/list_title1.gif"></li>
							<li class="list_title2"><img src="../img/board/list_title2.gif"></li>
							<li class="list_title3"><img src="../img/board/list_title3.gif"></li>
							<li class="list_title4"><img src="../img/board/list_title4.gif"></li>
							<li class="list_title5"><img src="../img/board/list_title5.gif"></li>
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
						$item_depth = $row[depth];

						$space = "";

						for ($i=0; $i < $item_depth; $i++) {
							$space = "&nbsp;&nbsp;".$space;						
						}
				?>
					<div id="list_item">
						<div class="list_item1"><?= $number ?> </div>
						<div class="list_item2"><?=$space?><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><?=$item_subject?></a></div>
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
							<!-- 목록 -->
							<a href="list.php?table=<?= $table ?>&page=<?= $page ?>">
							<img src="../img/board/list.png"></a> &nbsp;
							<!-- 글쓰기 -->
							<a href="write_form.php?table=<?= $table ?>">
							<img src="../img/board/write.png"></a>

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

<?
	include "../lib/footer.php";
?>
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

<?
	require_once "../../lib/header.php";
	require_once "../../lib/dbconn.php";

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

<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<? require_once "../../lib/community_sub_nav.php"; ?>
			<div class="main_content">

				<div class="main_co1">
					<h3> 자유 게시판 </h3>
				</div>

				<!-- 메인 시작 -->
				<div class="main_co2" style="padding:0px 32px 50px">

				<!-- start of Search Form -->
				<form name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search">

				<div id="list_search">
					<div class="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다. </div>
					<div class="list_search_form">
					<div class="list_search3"><select name="find">
											 <option value="subject">제목</option>
											 <option value="content">내용</option>
											 <option value="nick">작성자</option>
											  </select></div>
					<div class="list_search4"><input type="text" name="search"></div>
					<div class="list_search5"><input type="image" src="../../img/board/list_search_button.png"></div>
					</div><!-- end of list_search_form -->
				</div><!-- end of #list_search -->
				</form>
				<!-- end of Search Form -->


				<div class="clear"></div>

				<!-- start of BAR -->
				<table>
   				 <tr class="list_top_title">
        			<th class="num">번호</th>
        			<th class="subject">제목</th>
        			<th class="writer">작성자</th>
        			<th class="regist_day">작성일</th>
        			<th class="hit">조회</th>
    			 </tr>
				</table>
				<!-- end of BAR -->

				<div class="clear"></div>


				<!-- start of list_content -->

				<div id="list_content">
				<?
					require_once "../../lib/announcement.php";
				?>				
				<?
					for ($i=$start; $i < $start+$scale && $i < $total_record; $i++) { 
						mysqli_data_seek($result, $i);    // 포인터 이동
						$row = $result->fetch_assoc();    // 하나의 레코드 가져오기

						$item_num = $row[num];
						$item_id = $row[id];
						$item_name = $row[name];
						$item_nick = $row[name];
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
						<div class="list_item2"><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><?=$item_subject?></a>
				<?
					if ($num_ripple) echo "[$num_ripple]";
				?>						
						</div>
						<div class="list_item3"><?= $item_name ?></div>
						<div class="list_item4"><?= $item_date ?></div>
						<div class="list_item5"><?= $item_hit ?></div>
					</div><!-- end of #list_item -->
				<?
					$number--;
				}
				?>

					<div id="page_button">
						<div class="page_num"><img src="../../img/board/이전.png">
				<?
					// 게시판 목록 하단에 페이지 링크 번호 출력
					for ($i=1; $i<=$total_page; $i++) { 
						if ($page == $i) { // 현재 페이지 번호 링크 안함
							echo "<b> $i </b>";
						} else {
							echo "<a href='list.php?table=$table&page=$i'><b> $i </b></a>";
						}
					}
				?>
						<img src="../../img/board/다음.png">
						</div>
						<div class="button">
							<!-- 목록 -->
							<!-- <a href="list.php?table=<?= $table ?>&page=<?= $page ?>"> -->
							<!-- <img src="../../img/board/list.png"></a> &nbsp; -->
							<!-- 글쓰기 -->
							<a href="write_form.php?table=free">
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

<?
	require_once "../../lib/footer.php";
?>
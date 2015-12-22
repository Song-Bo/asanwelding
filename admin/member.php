<?
	session_start();
	$table = "member";
	$page = $_GET[page];
	$num = $_GET[num];
	$mode = $_GET[mode];
	$search = $_POST[search];
	$find = $_POST[find];
?>
<?
	require_once "../lib/header.php";
	require_once "../lib/dbconn.php";

	//아이디 삭제
	if($_POST['action']=='del'){
	 
	 $ck = $_POST[check];
	 for($a=0; $a<count($ck); $a++){
		$sql ="delete from member where id = '$ck[$a]'";
	 	$conn->query($sql);
	 }
	 $conn->close();
	 echo "<script> 
	 		alert('삭제되었습니다.');
			location.href='member.php';
	 </script>";
	 exit;
	}

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
		$sql = "select * from $table order by id desc";
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
<script>
	function chk(){
		if(confirm("정말삭제하시겠습니까? 삭제한 아이디는 복구가 불가능합니다.")){
			return true;
		}
		return false;
	}
</script>

<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<?
				require_once "../lib/admin_sub_nav.php";
			?>
			<div class="main_content">

				<div class="main_co1">
					<h3> 회원관리 </h3>
				</div>

				<!-- 메인 시작 -->
				<div class="main_co2" style="padding:0px 32px 50px">

				<!-- start of Search Form -->
				<form name="board_form" method="post" action="member.php?table=<?=$member?>&mode=search">

				<div id="list_search">
					<div class="list_search1">▷ 총 <?= $total_record ?> 개의 계정이 있습니다. </div>
					<div class="list_search_form">
					<div class="list_search3"><select name="find">
											 <option value="id">아이디</option>
											 <option value="name">이름</option>
											  </select></div>
					<div class="list_search4"><input type="text" name="search"></div>
					<div class="list_search5"><input type="image" src="../img/board/list_search_button.png"></div>
					</div><!-- end of list_search_form -->
				</div><!-- end of #list_search -->
				</form>
				<!-- end of Search Form -->


				<div class="clear"></div>

				
				<!-- start of BAR -->
				<table>
   				 <tr class="list_top_title_admin">
        			<th class="title_id">아이디</th>
        			<th class="title_name">이름</th>
        			<th class="title_birth">생년월일</th>
        			<th class="title_phone">연락처</th>
        			<th class="title_email">이메일</th>
    			 </tr>
				</table>
				<!-- end of BAR -->

				<div class="clear"></div>

				<!-- start of list_content -->

				<div id="list_content">
				<form name="member" method="POST" onsubmit="return chk()">
     			<input type="hidden" name="action" value="del" />				
				<?
					for ($i=$start; $i < $start+$scale && $i < $total_record; $i++) { 
						mysqli_data_seek($result, $i);    // 포인터 이동
						$row = $result->fetch_assoc();    // 하나의 레코드 가져오기
				?>        			
        			
					<div id="member_item">
					<div class="chk">
					<input type="checkbox" name="check" value="<?=$row[id]?>">
					</div>
						<div class="member_item1"><?=$row[id] ?> </div>
						<div class="member_item2"><?=$row[name] ?></div>
						<div class="member_item3"><?=$row[birth] ?></p></div>
						<div class="member_item4"><?=$row[phone] ?></div>
						<div class="member_item5"><?=$row[email] ?></div>
					</div><!-- end of #list_item -->
				<?
				}
				$conn->close();
				?>

					<div id="page_button">
						<div class="page_num"><img src="../img/board/이전.png">
				<?
					// 게시판 목록 하단에 페이지 링크 번호 출력
					for ($i=1; $i<=$total_page; $i++) { 
						if ($page == $i) { // 현재 페이지 번호 링크 안함
							echo "<b> $i </b>";
						} else {
							echo "<a href='member.php?table=$table&page=$i'><b> $i </b></a>";
						}
					}
				?>
						<img src="../img/board/다음.png">
						</div>
						<div class="button">
						<!-- 목록 -->
						<!-- <a href="list.php?table=<?= $table ?>&page=<?= $page ?>"> -->
						<!-- <img src="../../img/board/list.png"></a> &nbsp; -->
						<!-- 글쓰기 -->
						<input class="word" type="submit" value="삭제"/>
				
						</div><!-- end of button -->
					
					</div><!-- end of page_button -->
					</form>
				</div><!-- end of list content -->

				<div class="clear"></div>

				</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	require_once "../lib/footer.php";
?>





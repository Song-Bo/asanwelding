<?
	session_start();
	$table = "free_gallery";
	$ripple = "free_gallery_ripple";

	$page = $_GET[page];
	$num = $_GET[num];

	$mode = $_GET[mode];

	$search = $_POST[search];
	$find = $_POST[find];
?>
<?
	require_once "../../lib/header.php";
	require_once "../../lib/dbconn.php";

	$scale = 4; // 한 화면에 표시되는 글 수

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
<?
	$sql = "select * from $table";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$item_num = $row[num];
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

	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";  // 조회수 증가
	$conn->query($sql);
?>

<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<?
				require_once "../../lib/gallery_sub_nav.php";
			?>
			<div class="main_content">
			<div class="main_co1">
				<h2>자유 갤러리</h2>
			</div><!-- end of main_co1 -->
			<!-- start of main_co2 -->
			<div class="main_co2">
			<?
					for ($i=$start; $i < $start+$scale && $i < $total_record; $i++) { 
						mysqli_data_seek($result, $i);    // 포인터 이동
						$row = $result->fetch_assoc();    // 하나의 레코드 가져오기

						$item_num = $row[num];
						$subject = $row[subject];
						$item_date = $row[regist_day];
						$imageinfo = getimagesize("./data/".$row[file_copied_0]);
						$image_width = $imageinfo[0];
						$image_height = $imageinfo[1];
						$image_type = $imageinfo[2];

						if ($image_width > 338) {
							$image_width = 336;
						}
						
						if ($image_height > 342) {
							$image_height = 340;
						}
						
						else {
							$image_width = "";
							$image_height = "";
							$image_type  = "";
						}						
				?>
				
					<script>
						$(document).ready(function(){
							$('#item<?=$item_num?>').mouseover(function(){
								$('#item<?=$item_num?>').append("<h2 style='background-color:#fa2828;color:#ffffff;opacity:0.4;'><?=$row[subject]?></h2><h4 style='color:#fff;float:right;margin-right:5px;margin-top:290px'><?=$item_date ?></h4>");
							});
							$('#item<?=$item_num?>').mouseout(function(){
								$('#item<?=$item_num?>').text(""); 
							});
						});
					</script>
						
					<a class="gallery" href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
			
					<div id='item<?=$item_num?>'style='background-image:url(./data/<?=$row[file_copied_0]?>); 
					background-size:<?=$image_width?>px <?=$image_height?>px;
					width:<?=$image_width?>px; height:<?=$image_height?>px;'/>
					</div>

					</a>
							
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
				
				<?
					if($userid) {
				?>
					<a href="write_form.php?table=free_gallery">
					<p class="word">글쓰기</p></a>
				<?
					}
				?>
				
				</div><!-- end of button -->
			
			</div><!-- end of page_button -->

			</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
			
</div><!-- end of container -->

<?
	require_once "../../lib/footer.php";
?>
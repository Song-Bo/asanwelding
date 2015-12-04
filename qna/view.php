<?
	session_start();
	$table = "qna";
	$page = $_GET[page];
	$num = $_GET[num];
	/*
	$userid = $_SESSION[userid];
    $username = $_SESSION[username];
    $usernick = $_SESSION[usernick];
    $userlevel = $_SESSION[userlevel];
	*/	

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$item_num = $row[num];
  /*$item_id = $row[id];
	$item_name = $row[name];*/
	$item_nick = $row[nick];
	$item_hit = $row[hit];
	$item_date = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp", $row[subject]);
	$item_content = $row[content];
	// $is_html = $row[is_html];

  /*if ($is_html!="y") {
		$item_content = str_replace(" ", "&nbsp", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	} */

	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";  // 조회수 증가
	$conn->query($sql);
?>
<?
	include "../lib/header.php";
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
			</div><!-- end of sub_nav -->
			</div><!-- end of nav_wrap -->
			<div class="main_content">

				<div class="main_co1">
					<h3> Q & A </h3>
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
						<?= $item_content ?>
				</div>

				<div id="view_button">
					<a href="list.php?table=<?= $table ?>&page=<?=$page?>"><img src="../img/board/list.png"></a>&nbsp;
			<?
				// if ($userid && ($userid == $item_id) || $userlevel == 1) {
			?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">
					<img src="../img/board/modify.png"></a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">
					<img src="../img/board/delete.png"></a>&nbsp;
			<?
				// }
			?>
			
			<?
				if($userid) {
			?>
				<a href="write_form.php?table=<?= $table ?>"><img src="../img/board/write.png"></a>
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
	include "../lib/footer.php";
?>
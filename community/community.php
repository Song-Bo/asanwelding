<?
	session_start();
?>
<?
	require_once "../lib/header.php";
?>
<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
			<div class="nav">
				커뮤니티
			</div>			
			<ul class="sub_nav">
				<li class="sub_nav1"><a href="../community/free/list.php" class="sub_nav_txt">자유 게시판</a></li>
				<li class="sub_nav2"><a href="../community/job/list.php" class="sub_nav_txt">취업소식</a></li>
				<li class="sub_nav2"><a href="../community/download/list.php" class="sub_nav_txt">자료실</a></li>
				<li class="sub_nav2"><a href="../community/qna/list.php" class="sub_nav_txt">Q & A</a></li>
			</ul>
			</div><!-- end of nav_wrap -->
			<div class="main_content">
				<div class="main_co1">
					<h3>최근 게시물</h3>
				</div>
				<div class="main_co2">
				<!-- 최근글 불러오기 -->
					<? require_once "lib/func.php"; ?>
					<div id="latest">
						<div id="latest1">
							<div id="title_latest1"><h4>자유 게시판</h4></div>
							<div class="latest_box">
							<? latest_article("free", 5, 30); ?>
							</div>
						</div>	

						<div id="latest2">
							<div id="title_latest2"><h4>취업소식</h4></div>
							<div class="latest_box">
							<? latest_article("job", 5, 30); ?>					
							</div>
						</div>
					</div>
				<!-- 최근글 불러오기 -->
				</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	require_once "../lib/footer.php";
?>
<?
	session_start();
?>
<?
	require_once "../../lib/header.php";
?>
<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
			<div class="nav">
				커뮤니티
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
					<h3>최근 게시물</h3>
				</div>
				<div class="main_co2">
				<!-- 최근글 불러오기 -->
					<? require_once "../../lib/func.php"; ?>
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
	require_once "../../lib/footer.php";
?>
<?
	session_start();
?>
<?
	include "../lib/header.php";
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
				<div class="main_co1">
					
				</div>
				<div class="main_co2">
				<!-- 최근글 불러오기 -->
					<? include "../lib/func.php"; ?>
					<div id="latest">
						<div id="latest1">
							<div id="title_latest1"><img src="../img/board/title_latest1.gif"></div>
							<div class="latest_box">
							<? latest_article("free", 10, 30); ?>
							</div>
						</div>
						<!-- <div id="latest2">
							<div id="title_latest2"><img src="../img/board/title_latest2.gif"></div>
							<div class="latest_box">
							<? latest_article("concert", 10, 30); ?>
							</div>
						</div> -->
					</div>
				<!-- 최근글 불러오기 -->
				</div>
			</div>
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	include "../lib/footer.php";
?>
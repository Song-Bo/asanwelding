<!-- 관리자모드 메인 페이지 -->
<!-- 방문자수, 글 수, 통계 등 메인페이지 꾸미기 -->
<?
	session_start();
	require_once "../lib/header.php";
?>
<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<?
				require_once "../lib/admin_sub_nav.php";
			?>
			<div class="main_content">
				<div class="main_co1">
					<h3>최근 게시물</h3>
				</div>
				<div class="main_co2">
				<!-- 최근글 불러오기 -->
					<? require_once "../lib/func.php"; ?>
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





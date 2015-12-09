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
					<h1>관리자 페이지</h1>
					<hr/>
				</div>
				<div class="main_co2">
				<br><br><br><br><br>
				<h2 align="center">관리자 모드 메인 페이지</h2>
				<br><br>
				<p align="center"> 방문자 수, 트렌드, 통계, 글 수 등 꾸미기</p>


				</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	require_once "../lib/footer.php";
?>





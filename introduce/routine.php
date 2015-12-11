<?
	session_start();
	require_once "../lib/header.php";
?>
<script type="text/javascript">
try {
	document.execCommand('BackgroundImageCache', false, true);
} catch(e) {}
</script>
<script type="text/javascript" 
	src="http://openapi.map.naver.com/openapi/naverMap.naver?ver=2.0&key=0139a2ddedc8f337ca3d736be8b3f86d">
</script>

<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
				<div class="nav">학원소개
				<div class="nav_title">
					introduce
				</div></div>

					<ul class="sub_nav">
						<li class="sub_item"><a href="introduce.php" class="sub_item_txt tit1">인사말</a></li>
						<li class="sub_item"><a href="routine.php" class="sub_item_txt tit2">오시는 길</a></li>
					</ul>			
			</div>
			<div class="main_content">
				<div class="main_co1">
					<? require_once "map.php"; ?>
				</div>
				<div class="main_co2">
					
				    <pre>

					주소 : 충청남도 아산시 온천동 260-155
					 TEL : 041 - 541 - 8252
					</pre> 
				</div>
			</div>
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	require_once "../lib/footer.php";
?>
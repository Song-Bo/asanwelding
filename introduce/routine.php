<?
	session_start();
	include "../lib/header.php";
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
			<div class="nav">
				<img src="../img/nav_menu1.png" width="200" height="200" alt="학원소개">
			</div>
			<div class="sub_nav">
				<div class="sub_nav1">
					<a href="../introduce/introduce.php"><img src="../img/menu1_sub_nav_1.png" width="200" height="66" alt="인사말"></a>
				</div>
				<div class="sub_nav2">
					<a href="#"><img src="../img/menu1_sub_nav_2.png" width="200" height="56" alt="오시는 길"></a>
				</div>
			</div>
			</div>
			<div class="main_content">
				<div class="main_co1">
					<? include "map.php"; ?>
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
	include "../lib/footer.php";
?>
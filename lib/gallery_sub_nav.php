<meta charset="UTF-8">
<?
	session_start();
	$url = "http://$_SERVER[HTTP_HOST]/asan";
?>
<div class="nav_wrap" style="background-color:#fff;">
	<div class="nav">
		갤러리
	<div class="nav_title">
		gallery
	</div>
	</div>
	<ul class="sub_nav" >
		<li class="sub_item"><a href="<?=$url?>/gallery/site/list.php" class="sub_item_txt tit0">현장 갤러리</a></li>
		<li class="sub_item"><a href="<?=$url?>/gallery/train/list.php" class="sub_item_txt tit1">실습 갤러리</a></li>
	</ul>
</div><!-- end of nav_wrap -->
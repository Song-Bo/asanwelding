<meta charset="UTF-8">
<?
	session_start();
	$url = "http://$_SERVER[HTTP_HOST]/asan";
?>
<div class="nav_wrap">
	<div class="nav">
		커뮤니티
	<div class="nav_title">
		community
	</div>
	</div>
	<ul class="sub_nav">
		<li class="sub_item"><a href="<?=$url?>/community/notice/list.php" class="sub_item_txt tit0">공지사항</a></li>
		<li class="sub_item"><a href="<?=$url?>/community/free/list.php" class="sub_item_txt tit1">자유게시판</a></li>
		<li class="sub_item"><a href="<?=$url?>/community/job/list.php" class="sub_item_txt tit2">취업소식</a></li>
		<li class="sub_item"><a href="<?=$url?>/community/download/list.php" class="sub_item_txt tit3">자료실</a></li>
		<li class="sub_item"><a href="<?=$url?>/community/qna/list.php" class="sub_item_txt tit4">Q & A</a></li>
	</ul>
</div><!-- end of nav_wrap -->
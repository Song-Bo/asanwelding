<meta charset="UTF-8">
<?
	$url = "http://$_SERVER[HTTP_HOST]/asan";
?>
<div class="nav_wrap">
	<div class="admin_nav">
		관리자 모드
		<div class="nav_title">
			administration
		</div>
	</div>
		<ul class="sub_nav">
			<li class="sub_item"><a href="<?=$url?>/community/notice/list.php" class="sub_item_txt tit1">공지사항</a></li>
			<li class="sub_item"><a href="<?=$url?>/admin/member.php" class="sub_item_txt tit2">회원관리</a></li>
			<li class="sub_item"><a href="<?=$url?>/admin/mail.php" class="sub_item_txt tit3">메일발송</a></li>
			<li class="sub_item"><a href="<?=$url?>/community/qna/list.php" class="sub_item_txt tit4">Q & A 답변</a></li>
		</ul>
</div><!-- end of nav_wrap -->
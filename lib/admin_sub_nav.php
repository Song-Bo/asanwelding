<?
	$url = "http://$_SERVER[HTTP_HOST]/asan";
?>
<div class="nav_wrap">
	<div class="admin_nav">
		관리자 모드
	</div>
	<ul class="admin_sub_nav">
				<li class="sub_nav1"><a href="<?=$url?>/admin/notice/list.php" class="sub_nav_txt">공지사항</a></li>
				<li class="sub_nav2"><a href="<?=$url?>/admin/member/list.php" class="sub_nav_txt">회원관리</a></li>
				<li class="sub_nav3"><a href="<?=$url?>/admin/mail/list.php" class="sub_nav_txt">메일발송</a></li>
				<li class="sub_nav4"><a href="<?=$url?>/community/qna/list.php" class="sub_nav_txt">Q & A 답변</a></li>				
	</ul>
</div><!-- end of nav_wrap -->
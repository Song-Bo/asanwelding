<?
	session_start();
	$url = "http://$_SERVER[HTTP_HOST]/asan"; 
	$userid = $_SESSION[userid];
	$username = $_SESSION[username];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
<meta name="format-detection" content="telephone=no" />
<meta http-equiv="Cache-Control" content="No-Cache">
<link rel="stylesheet" type="text/css" href="<?=$url?>/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=$url?>/css/freeboard.css">
<link rel="stylesheet" type="text/css" href="<?=$url?>/css/layout.css">
<title>아산용접배관학원</title>
<script src="http://code.jquery.com/jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?=$url?>/js/phoschool/jquery-scrollnews.js"></script>
<script type="text/javascript" src="<?=$url?>/js/phoschool/jquery-blink.js"></script>
<script type="text/javascript" src="<?=$url?>/js/jquery.leanModal.min.js"></script>
<script>
$(document).ready(function(){
	// 공지사항 롤링
	$("#roll").Scroll({
		line:1,
		speed:500,
		timer:3000
	});
});	
</script>
<script>
	function first_focus() {
		document.login_form.id.focus();
		return;
	}
</script>
</head>
<body>

<!-- start of header -->
<div id="header" class="header">
	<!-- header of global -->
	<div class="global">
		<div id="top" class="above">
		<div class="notice">		
		
			<div class="global_notice fl">
				<div class="notice_title fl"><a href="<?=$url?>/admin/notice/list.php"></a></div>
				
				<div class="notice_top3" id="roll" style="overflow:hidden;">
				<ul>
					<? 
						require_once "global_notice.php"; 
					?>					
				</ul>
				</div>
			</div>
			
		</div><!-- end of notice -->
		<ul class="util">
		<?
			$userid = $_SESSION['userid'];
			if (!$userid) {
		?>
			<li><a href="#loginmodal" class="flatbtn" id="modaltrigger">로그인</a></li>
			<li><a href="<?=$url?>/member/member_form.php">회원가입</a></li>
		<?
			} else if ($userid) {
		?>
			<li><?=$username?> 님 반갑습니다.</li>
		<? if ($userid == "admin") { ?>
			<li><a href="<?=$url?>/admin/administration.php">관리자 모드</a></li>
			<li><a href="<?=$url?>/login/logout.php">로그아웃</a></li>
		<? } else { ?>
			<li><a href="<?=$url?>/member/member_form_modify.php">마이페이지</a></li>
			<li><a href="<?=$url?>/login/logout.php">로그아웃</a></li>
		<?
			}
		}
		?>
		</ul>		
		</div>
	</div><!-- end of global -->

	<!-- header of center -->
	<div class="center">
		<div class="logo_wrap">
			<a href="<?=$url?>/index.php" class="logo_txt">아산용접배관학원</a>			
		</div>
		<div class="menu_wrap">
			<ul class="menu">
				<li class="menu_item"><a href="<?=$url?>/introduce/introduce.php" class="menu_item_txt tit1">학원소개</a></li>
				<li class="menu_item"><a href="<?=$url?>/information/information.php" class="menu_item_txt tit2"> 수강안내</a></li>
				<li class="menu_item"><a href="<?=$url?>/community/community.php" class="menu_item_txt tit3">커뮤니티</a></li>
				<li class="menu_item"><a href="<?=$url?>/gallery/gallery.php" class="menu_item_txt tit4">갤러리</a></li>
			</ul>
		</div>
	</div><!-- end of center -->
</div><!-- end of Header -->






<!-- start of Modal Login Part -->
<div id="loginmodal" style="display:none;">
	<h2>아산용접배관학원</h2>
	<div class="p_c_text">회원이 되시면 여러 혜택을 누리실 수 있습니다.</div>

	<!-- start of form -->
	<form method="POST" action="#"><!--<?=$url?>/login/login.php -->
	<div class="login_line">
		<div class="box_in1">
			 <input type="text" name="id" id="id" placeholder="아이디" size="30" >
			 <input type="password" name="pw" id="pw" placeholder="비밀번호" size="30">
		</div>		
	</div>
	<div class="box_in2"><input type="submit" title="로그인" alt="로그인" value="로그인" class="lgn" /></div>
	<div class="find_join"><a href="">아이디/비밀번호 찾기</a> &nbsp;|&nbsp; <a href="<?=$url?>/member/member_form.php">회원가입</a></div>
	</form>
	<!-- end of form -->

</div>




<!-- Modal Login Part -->
<script type="text/javascript">
$(function(){
  $("form").submit(function(e){	
  	var id = $('#id').val();
  	var pw = $('#pw').val();

	if (!id) {
		alert('아이디를 입력하세요.');
		$('#id').val();
		$('#id').focus();
		return false;
			
	} else if (!pw) {
		alert('비밀번호를 입력하세요.');
		$('#pw').val();
		$('#pw').focus();		
		return false;
	}

	$.ajax({
		url:"<?=$url?>/lib/login_ajax.php",
		type:"POST",
		data:{"id":id, 'pw':pw},
		dataType:"Json",
		error: function(request, status, error) {
			alert('아산용접배관학원에 오신걸 환영합니다 !');
			location.href="<?=$url?>/index.php";
		},
		success: function(res) {
			if(res[0].confirm=="ok") {
				alert('어서 오세요 !');
				location.href="../index.php";
			} else if(res[0].confirm=="no") {
				if(res[0].reason=="noid") {
					alert('등록되지 않은 아이디 입니다 !');
					$('#pw').val("");
					$('#id').val();
					$('#id').focus();
					$('#id').select();

				} else if (res[0].reason == "nopw") {
					alert('비밀번호가 일치하지 않습니다 !');
					$('#pw').val("");
					$('#pw').focus();
					$('#pw').select();
				}
			}
		}
	});	
  	 return false;    
  });
  


  $('#modaltrigger').leanModal({ 
   	top: 100, 
  	overlay: 0.3, 
  	closeButton: ".hidemodal" 

  });

  $('#modaltrigger').click(function (){
  	$('#id').val("");
  	$('#id').focus();
  });
});

</script>


<!-- end of Modal Login Part -->
